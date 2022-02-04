<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Http\Requests\QuestionCreateRequest;
use App\Http\Requests\QuestionUpdateRequest;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //$questions =  Quiz::find($id)->questions;//hasmany özelliği ile quiz modelinden questiona erişim sağlandı.
        $quiz = Quiz::whereId($id)->with("questions")->first() ?? abort(404,"Quiz Bulunamadı");//questions adlı relationshipten veriyi quiz verileri ile okutuyoruz.
        return view('admin.question.list',compact('quiz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $quiz = Quiz::find($id);
        return view('admin.question.create',compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionCreateRequest $request,$id)
    {
        if($request->hasFile('image')){
            $fileName = Str::slug($request->question).'.'.$request->image->extension();//dosya adını sorunun adıyla değiştiriliyor ve uzantısını belirtiyoruz.
            $fileNameWithUpload = 'uploads/'.$fileName;//publicteki uploads klasörüne depolanıyor
            $request->image->move(public_path('uploads'),$fileName);//resmi yüklemek için kullanılabilecek bir metot
            //veri tabanında stuna kaydetme.
            $request->merge([
                'image' => $fileNameWithUpload
            ]);
        }
        Quiz::find($id)->questions()->create($request->post());

        return redirect()->route('questions.index',$id)->withSuccess('Soru başarıyla oluşturuldu.');
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
    public function edit($quiz_id,$question_id)
    {
        $question = Quiz::find($quiz_id)->questions()->whereId($question_id)->first() ?? abort(404,'Quiz veya soru bulunamadı');
        return view('admin.question.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionUpdateRequest $request, $quiz_id,$question_id)
    {
        if($request->hasFile('image')){
            $fileName = Str::slug($request->question).'.'.$request->image->extension();//dosya adını sorunun adıyla değiştiriliyor ve uzantısını belirtiyoruz.
            $fileNameWithUpload = 'uploads/'.$fileName;//publicteki uploads klasörüne depolanıyor
            $request->image->move(public_path('uploads'),$fileName);//resmi yüklemek için kullanılabilecek bir metot
            //veri tabanında stuna kaydetme.
            $request->merge([
                'image' => $fileNameWithUpload
            ]);
        }
        Quiz::find($quiz_id)->questions()->whereId($question_id)->first()->update($request->post());

        return redirect()->route('questions.index',$quiz_id)->withSuccess('Soru başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($quiz_id,$question_id)
    {
        Quiz::find($quiz_id)->questions()->whereId($question_id)->delete();
        return redirect()->route('questions.index',$quiz_id)->withSuccess('Soru başarıyla silindi');
    }
}
