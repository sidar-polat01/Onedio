<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index($id){
        $news = News::whereId($id)->with("articles")->first() ?? abort(404,"Haber Bulunamadı");
        return view('admin.article.list',compact('news'));
    }

    public function create($id)
    {
        $news = News::find($id);
        return view('admin.article.create',compact('news'));
    }

    public function createPost(Request $request,$id){
        if($request->hasFile('image')){
            $fileName = Str::slug($request->article).'.'.$request->image->extension();//dosya adını sorunun adıyla değiştiriliyor ve uzantısını belirtiyoruz.
            $fileNameWithUpload = 'uploads/'.$fileName;//publicteki uploads klasörüne depolanıyor
            $request->image->move(public_path('uploads'),$fileName);//resmi yüklemek için kullanılabilecek bir metot
            //veri tabanında stuna kaydetme.
            $request->merge([
                'image' => $fileNameWithUpload
            ]);
        }
        News::find($id)->articles()->create($request->post());
        return redirect()->route('article.index',$id)->withSuccess('Soru başarıyla oluşturuldu.');
    }

    public function edit($news_id,$article_id){
        $article = News::find($news_id)->articles()->whereId($article_id)->first() ?? abort(404,'Haber veya makale bulunamadı');
        return view('admin.article.edit',compact('article'));
    }

    public function update(Request $request, $news_id,$article_id)
    {
        if($request->hasFile('image')){
            $fileName = Str::slug($request->article).'.'.$request->image->extension();//dosya adını sorunun adıyla değiştiriliyor ve uzantısını belirtiyoruz.
            $fileNameWithUpload = 'uploads/'.$fileName;//publicteki uploads klasörüne depolanıyor
            $request->image->move(public_path('uploads'),$fileName);//resmi yüklemek için kullanılabilecek bir metot
            //veri tabanında stuna kaydetme.
            $request->merge([
                'image' => $fileNameWithUpload
            ]);
        }
        News::find($news_id)->articles()->whereId($article_id)->first()->update($request->post());
        return redirect()->route('article.index',$news_id)->withSuccess('Soru başarıyla güncellendi.');
    }

    public function destroy($news_id,$article_id)
    {
        News::find($news_id)->articles()->whereId($article_id)->delete();
        return redirect()->route('article.index',$news_id)->withSuccess('Soru başarıyla silindi');
    }
}
