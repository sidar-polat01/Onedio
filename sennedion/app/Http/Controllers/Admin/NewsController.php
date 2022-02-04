<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index(){
        $news = News::withCount('articles')->orderBy('created_at','DESC');
        if(request()->get('title')){
            $news = $news->where('title','LIKE',"%".request()->get('title')."%");
        }

        if(request()->get('status')){
            $news = $news->where('status',request()->get('status'));
        }
        $news = $news->paginate(10);
        return view('admin.news.list',compact('news'));
    }

    public function create(){
        $news=News::all();
        $categories=Category::all();
        return view('admin.news.create',compact('news','categories'));
    }

    public function createPost(Request $request){
        $news = new News;
        $news->title=$request->title;
        $news->slug = Str::slug($request->title);
        $news->description=$request->description;
        $news->category_id=$request->category;
        if($request->hasFile('image')){//resim varsa
            $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $news->image='uploads/'.$imageName;
        }
        $news->save();
        return redirect()->route('news.index');
    }

    public function update($id){
        $news=News::findOrFail($id);
        $categories=Category::all();
        return view('admin.news.edit',compact('news','categories'));
    }

    public function updatePost(Request $request,$id){
        $news=News::findOrFail($id);
        $news->title=$request->title;
        $news->category_id=$request->category;
        $news->description=$request->description;
        $news->status=$request->status;
        $news->slug=$request->title;
        if($request->hasFile('image')){//resim varsa
            $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $news->image='uploads/'.$imageName;
        }
        $news->save();
        return redirect()->route('news.index');
    }

    public function delete($id)
    {
        News::find($id)->delete();
        return redirect()->route('news.index');
    }
}
