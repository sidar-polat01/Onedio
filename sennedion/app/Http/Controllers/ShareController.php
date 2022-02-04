<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Share;
use App\Models\ShareCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShareController extends Controller
{
    public function index(){
        $shares = Share::where('status','publish')->get();
        $quizzes = Quiz::where('status','publish')->withCount('questions')->inRandomOrder()->paginate(7);
        return view('front.shares.index',compact('quizzes','shares'));
    }
    public function create(){
        $categories= ShareCategory::all();
        return view('front.shares.create',compact('categories'));
    }
    public function createPost(Request $request){
        $shares= new Share;
        $shares->userName=$request->userName;
        $shares->title=$request->title;
        $shares->slug = Str::slug($request->title);
        $shares->description=$request->description;
        $shares->category_id=$request->category;
        if($request->hasFile('image')){//resim varsa
            $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $shares->image='uploads/'.$imageName;
        }
        $shares->save();
        return redirect()->route('home.shares.index');
    }
}
