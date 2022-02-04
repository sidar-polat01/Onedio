<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Share;
use App\Models\ShareCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SharesController extends Controller
{
    public function index(){
        $shares=Share::orderBy('created_at','DESC')->paginate(10);
        return view('admin.shares.list',compact('shares'));
    }
    public function update($id){
        $shares=Share::findOrFail($id);
        $categories=ShareCategory::all();
        return view('admin.shares.edit',compact('shares','categories'));
    }
    public function updatePost(Request $request,$id){
        $shares=Share::findOrFail($id);
        $shares->title=$request->title;
        $shares->description=$request->description;
        $shares->status=$request->status;
        $shares->slug=Str::slug($request->title);
        if($request->hasFile('image')){//resim varsa
            $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $shares->image='uploads/'.$imageName;
        }
        $shares->save();
        return redirect()->route('shares.index');
    }

    public function delete($id)
    {
        Share::find($id)->delete();
        return redirect()->route('shares.index');
    }
}
