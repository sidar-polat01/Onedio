<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::orderBy('created_at','DESC')->get();
        return view('admin.category.index',compact('categories'));
    }

    public function create(Request $request){
        $isExist=Category::whereName($request->category)->first();
        if($isExist){
            return redirect()->back();
        }
        $category = new Category;
        $category->name=$request->category;
        $category->slug=$request->category;
        $category->save();
        return redirect()->back();
    }

    public function update($id){
        $categories=Category::findOrFail($id);
        return view('admin.category.edit',compact('categories'));
    }

    public function updatePost(Request $request, $id){
        $categories = Category::findOrFail($id);
        $categories->name=$request->category;
        $categories->slug=$request->category;
        $categories->save();
        return redirect()->route('category.index');
    }

    public function delete(Request $request)
    {
        $category=Category::findOrFail($request->id);
        if($category->id==1){
            return redirect()->back()->withDanger('Bu kategori silinemez');
        }
        $count=$category->newsCount();
        if($count>0){
            News::where('category_id',$category->id)->update(['category_id'=>1]);
            $defaultCategory=Category::find(1);
        }
        $category->delete();
        return redirect()->back();
    }

}
