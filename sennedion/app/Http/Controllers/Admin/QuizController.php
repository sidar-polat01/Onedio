<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Http\Requests\QuizCreateRequest;
use App\Http\Requests\QuizUpdateRequest;
use Illuminate\Support\Str;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::withCount('questions')->orderBy('created_at','DESC');

        if(request()->get('title')){
            $quizzes = $quizzes->where('title','LIKE',"%".request()->get('title')."%");
        }

        if(request()->get('status')){
            $quizzes = $quizzes->where('status',request()->get('status'));
        }

        $quizzes = $quizzes->paginate(10);
        return view('admin.quiz.list',compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizCreateRequest $request)
    {
        if($request->hasFile('image')){
            $fileName = Str::slug($request->title).'.'.$request->image->extension();//dosya adını sorunun adıyla değiştiriliyor ve uzantısını belirtiyoruz.
            $fileNameWithUpload = 'uploads/'.$fileName;//publicteki uploads klasörüne depolanıyor
            $request->image->move(public_path('uploads'),$fileName);//resmi yüklemek için kullanılabilecek bir metot
            //veri tabanında stuna kaydetme.
            $request->merge([
                'image' => $fileNameWithUpload
            ]);
        }
        Quiz::create($request->post());
        return redirect()->route('quizzes.index')->withSuccess('Quiz Başarıyla Eklendi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz =Quiz::find($id) ?? abort(404,'Quiz Bulunamadı');
        return view('admin.quiz.edit',compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuizUpdateRequest $request, $id)
    {
        if($request->hasFile('image')){

            $fileName = Str::slug($request->title).'.'.$request->image->extension();//dosya adını sorunun adıyla değiştiriliyor ve uzantısını belirtiyoruz.
            $fileNameWithUpload = 'uploads/'.$fileName;//publicteki uploads klasörüne depolanıyor
            $request->image->move(public_path('uploads'),$fileName);//resmi yüklemek için kullanılabilecek bir metot
            //veri tabanında stuna kaydetme.
            $request->merge([
                'image' => $fileNameWithUpload
            ]);
        }
        $quiz =Quiz::find($id) ?? abort(404,'Quiz Bulunamadı');
        Quiz::where('id',$id)->first()->update($request->post());
        return redirect()->route('quizzes.index')->withSuccess("Quiz başarıyla güncellendi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz =Quiz::find($id) ?? abort(404,'Quiz Bulunamadı');
        $quiz->delete();
        return redirect()->route('quizzes.index')->withSuccess("Quiz Silme Başarıyla Gerçekleşti.");
    }
}
