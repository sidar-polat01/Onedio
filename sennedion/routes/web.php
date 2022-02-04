<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\ShareController;
use App\Http\Controllers\Admin\SharesController;
use App\Http\Controllers\Admin\ShareCategoryController;

Route::get('/', function () {
    return view('welcome');
});
    //KULLANICI
Route::group(['middlewere' => 'auth'],function (){
   Route::get('panel',[MainController::class,'dashboard'])->name('dashboard');
   Route::get('quiz/{slug}',[MainController::class,'quiz'])->name('quiz.join');
   Route::post('quiz/{slug}/result',[MainController::class,'result'])->name('quiz.result');
    Route::get('news/{slug}',[MainController::class,'article'])->name('news.join');
    Route::get('news',[MainController::class,'newsIndex'])->name('home.news.index');
    Route::get('quizzes',[MainController::class,'quizzesIndex'])->name('home.quizzes.index');
    //Share
    Route::get('shares',[MainController::class,'sharesIndex'])->name('home.shares.index');
    Route::get('shares/create',[MainController::class,'create'])->name('home.shares.create');
    Route::get('shares/{slug}',[MainController::class,'share'])->name('shares.join');

    Route::post('shares/create',[ShareController::class,'createPost'])->name('home.shares.create.post');
});
    //ADMIN
Route::group(['middleware'=>['auth','isAdmin'],'prefix'=>'admin'],function (){
    Route::get('quizzes/{id}',[QuizController::class,'destroy'])->whereNumber('id')->name('quizzes.destroy');
    Route::get('quiz/{quiz_id}/questions/{id}',[QuestionController::class,'destroy'])->whereNumber('id')->name('questions.destroy');
    Route::resource('quizzes',QuizController::class);
    Route::resource('quiz/{quiz_id}/questions',QuestionController::class);
    //CATEGORY
    Route::get('/category',[CategoryController::class,'index'])->name('category.index');
    Route::post('/category/create',[CategoryController::class,'create'])->name('category.create');
    Route::get('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::post('/category/update/{id}',[CategoryController::class,'updatePost'])->name('category.update.post');
    Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
    //NEWS
    Route::get('/news',[NewsController::class,'index'])->name('news.index');
    Route::get('/news/create',[NewsController::class,'create'])->name('news.create');
    Route::post('/news/create',[NewsController::class,'createPost'])->name('news.create.post');
    Route::get('/news/update/{id}',[NewsController::class,'update'])->name('news.update');
    Route::post('/news/update/{id}',[NewsController::class,'updatePost'])->name('news.update.post');
    Route::get('/news/delete/{id}',[NewsController::class,'delete'])->name('news.delete');
    //ARTICLE
    Route::get('news/{article_id}',[ArticleController::class,'index'])->name('article.index');
    Route::get('news/{article_id}/create',[ArticleController::class,'create'])->name('article.create');
    Route::post('news/{article_id}/create',[ArticleController::class,'createPost'])->name('article.create.post');
    Route::get('news/{article_id}/edit/{id}',[ArticleController::class,'edit'])->name('article.edit');
    Route::post('news/{article_id}/edit/{id}',[ArticleController::class,'update'])->name('article.update');
    Route::get('news/{article_id}/article/{id}',[ArticleController::class,'destroy'])->name('article.destroy');
    //SHARE
    Route::get('/shares',[SharesController::class,'index'])->name('shares.index');
    Route::get('/shares/update/{id}',[SharesController::class,'update'])->name('shares.update');
    Route::post('/shares/update/{id}',[SharesController::class,'updatePost'])->name('shares.update.post');
    Route::get('/shares/delete/{id}',[SharesController::class,'delete'])->name('shares.delete');
    //SHARE CATEGORY
    Route::get('/share/category',[ShareCategoryController::class,'index'])->name('share.category.index');
    Route::post('/share/category/create',[ShareCategoryController::class,'create'])->name('share.category.create');
    Route::get('/share/category/update/{id}',[ShareCategoryController::class,'update'])->name('share.category.update');
    Route::post('/share/category/update/{id}',[ShareCategoryController::class,'updatePost'])->name('share.category.update.post');
    Route::get('/share/category/delete/{id}',[ShareCategoryController::class,'delete'])->name('share.category.delete');
});
