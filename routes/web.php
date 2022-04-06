<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\PostsController;

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

//一覧表示
Route::get('/', function(){
    return view('welcome');
});

//一覧表示:TOP
Route::get('/posts_list', [PostsController::class, 'index']);

//登録画面
Route::get('/posts', [PostsController::class, 'create']);

//登録処理 登録画面
Route::post('/posts', [PostsController::class, 'store']);

//更新画面
Route::get('/posts_edit/{post}',[PostsController::class, 'edit']);

//更新処理
Route::post('posts/update',[PostsController::class, 'update']);

//登録を削除
Route::delete('/post/{post}',[PostsController::class, 'destroy']);

//登録詳細画面
Route::get('/posts_detail/{id}', [PostsController::class, 'show']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
