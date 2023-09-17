<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[ArticleController::class,'index']);

Route::get('articles',[ArticleController::class,'index']);

Route::get('articles/detail/{id}',[ArticleController::class,'detail']);

Route::get("articles/more", function (){
    return redirect()->route('article.detail');
});

Route::get("articles/add",[ArticleController::class,'add']);
Route::post("articles/add",[ArticleController::class,'create']);
Route::get("articles/delete/{id}",[ArticleController::class,'delete']);

Route::get("articles/edit/{id}",[ArticleController::class, 'edit']);
Route::post("articles/edit/{id}",[ArticleController::class, 'update']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//for comments route
Route::post('comments/add',[CommentController::class,'create']);
Route::get('/comments/delete/{id}',[CommentController::class,'delete']);



