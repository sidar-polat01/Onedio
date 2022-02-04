<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\ShareCategory;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Result;
use App\Models\Share;


class MainController extends Controller
{
    public function dashboard(){
        $categories=Category::all();
        $news = News::where('status','publish')->orderBy('created_at','DESC')->paginate(4);
        $shares = Share::where('status','publish')->orderBy('created_at','DESC')->get();
        $shareCategories = ShareCategory::where('status','publish')->orderBy('created_at','DESC')->paginate(3);
        $quizzes = Quiz::where('status','publish')->withCount('questions')->orderBy('created_at','DESC')->paginate(7);
        return view('front.dashboard',compact('quizzes','news','categories','shares','shareCategories'));
    }

    public function quiz($slug){
        $quiz = Quiz::whereSlug($slug)->withCount('questions')->with('questions','my_result')->first() ?? abort(404,'Quiz Bulunamadı');
        $quizzes = Quiz::where('status','publish')->withCount('questions')->inRandomOrder()->paginate(7);
        $categories=Category::all();
        $news = News::where('status','publish')->get();
        return view('front.test.quiz',compact('quiz','quizzes','news','categories'));
    }
    public function result(Request $request,$slug){
        $quiz=Quiz::with('questions')->whereSlug($slug)->first() ?? abort(404,'Quiz Bulunamadı');
        $correct=0;
        foreach ($quiz->questions as $question){
            //echo $question->id.'-'.$question->correct_answer.'/'.$request->post($question->id).'<br>';
            Answer::create([
                'user_id'=>auth()->user()->id,
                'question_id'=>$question->id,
                'answer'=>$request->post($question->id)
            ]);

            //echo $question->correct_answer.'-'.$request->post($question->id).'<br>';


            if($question->correct_answer===$request->post($question->id)){
                $correct+=1;
            }
        }

        $point= round((100/count($quiz->questions))*$correct);
        $wrong= count($quiz->questions)-$correct;
        $message = '';
        if ($point==100){
            $message='Sen aklına koyduğun her şeyi başarırsın Çünkü senin inanılmaz bir gücün var ve sevginn de var. ';
        }
        else if($point>=60 && $point<100){
            $message ='Kendini iyi tanıyan birisi olduğunu görüyorum ve bu durum seni hayatta her zaman başarıya ulaştıracaktır.';
        }
        else if ($point<60 &&$point>=30){
            $message = 'Kendine vakit ayırman seni daha başarılı duruma getirir.';
        }
        else if ($point<30 &&$point>0){
            $message = 'Bazen verdiğin kararlar başkaları tarafından hoş karşılanmayabilir.';
        }
        else if($point==0){
            $message='Durumun cidden kötü , bir an önce yemek yemelisin.';
        }
        Result::create([
            'user_id'=>auth()->user()->id,
            'quiz_id'=>$quiz->id,
            'point'=>$point,
            'correct'=>$correct,
            'wrong'=>$wrong,
        ]);
        return redirect()->route('quiz.join',$quiz->slug)->withSuccesse($message);
    }


    public function article($slug){
        $news = News::whereSlug($slug)->withCount('articles')->with('articles')->first();
        $newss = News::where('status','publish')->withCount('articles')->orderBy('created_at','DESC')->paginate(7);
        $quizzes = Quiz::where('status','publish')->withCount('questions')->orderBy('created_at','DESC')->paginate(7);
        $categories=Category::all();
        return view('front.news.article',compact('news','newss','quizzes','categories'));
    }
    public function newsIndex(){
        $news = News::withCount('articles')->where('status','publish')->orderBy('created_at','DESC')->paginate(15);

        if(request()->get('category_id')){
            $news = $news->where('category_id',request()->get('category_id'));
        }


        $quizzes = Quiz::where('status','publish')->orderBy('created_at','DESC')->paginate(10);
        $categories=Category::all();
        return view('front.news.index',compact('news','quizzes','categories'));
    }
    public function quizzesIndex(){
        $news = News::where('status','publish')->orderBy('created_at','DESC')->paginate(3);
        $quizzes = Quiz::where('status','publish')->orderBy('created_at','DESC')->paginate(5);
        $categories=Category::all();
        return view('front.test.index',compact('news','quizzes','categories'));
    }
    public function sharesIndex(){
        $shareCategories=ShareCategory::where('status','publish')->orderBy('created_at','DESC')->paginate(5);
        $quizzes = Quiz::where('status','publish')->orderBy('created_at','DESC')->paginate(6);
        $categories=Category::all();
        $news = News::where('status','publish')->orderBy('created_at','DESC')->paginate(3);
        return view('front.shares.index', compact('shareCategories','quizzes','categories','news'));
    }
    public function share($slug){
        $category = ShareCategory::whereSlug($slug)->first()??abort(403,'Böyle bir kategori bulunamadıki');
        $data['category']=$category;
        $data['shares']=Share::where('category_id',$category->id)->where('status','publish')->orderBy('created_at','DESC')->get();
        $quizzes = Quiz::where('status','publish')->withCount('questions')->inRandomOrder()->paginate(7);
        return view('front.shares.share',$data,compact('quizzes'));
    }
    public function create(){
        $categories= ShareCategory::all();
        return view('front.shares.create',compact('categories'));
    }
}
