<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Share;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\ShareCategory;
use Illuminate\Support\Str;

class ShareCategoryController extends Controller
{
    public function index(){
        $categories=ShareCategory::orderBy('created_at','DESC')->get();
        return view("admin.shareCategory.index",compact('categories'));
    }
    public function create(Request $request){
        $isExist=ShareCategory::whereName($request->name)->first();
        if($isExist){
            return redirect()->back();
        }
        $category = new ShareCategory;
        $category->name=$request->name;
        $category->slug=Str::slug($request->name);
        $category->description=$request->description;
        if($request->hasFile('image')){//resim varsa
            $imageName=Str::slug($request->name).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $category->image='uploads/'.$imageName;
        }
        $category->save();
        return redirect()->back();
    }

    public function update($id){
        $categories=ShareCategory::findOrFail($id);
        return view('admin.shareCategory.edit',compact('categories'));
    }

    public function updatePost(Request $request, $id){
        $categories = ShareCategory::findOrFail($id);
        $categories->name=$request->name;
        $categories->slug=Str::slug($request->name);
        $categories->description=$request->description;
        $categories->status=$request->status;
        if($request->hasFile('image')){//resim varsa
            $imageName=Str::slug($request->name).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $categories->image='uploads/'.$imageName;
        }
        $categories->save();
        return redirect()->route('share.category.index');
    }

    public function delete(Request $request)
    {
        $category=ShareCategory::findOrFail($request->id);
        if($category->id==1){
            return redirect()->back()->withDanger('Bu kategori silinemez');
        }
        $count=$category->shares();
        if($count>0){
            Share::where('category_id',$category->id)->update(['category_id'=>1]);
            $defaultCategory=ShareCategory::find(1);
        }
        $category->delete();
        return redirect()->back();
    }
}
