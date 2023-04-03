<?php

use Illuminate\Support\Facades\Route;

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

/* 使っていない
Route::get('/', function () {
    return view('welcome');
});
*/

// ニュース記事
use App\Http\Controllers\Admin\NewsController;
Route::controller(NewsController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    // 管理者としてログインしないと操作できないもの
    Route::get('news/create', 'add')->name('news.add');
    Route::post('news/create', 'create')->name('news.create');
    Route::get('news', 'index')->name('news.index');
    Route::get('news/edit', 'edit')->name('news.edit');
    Route::post('news/edit', 'update')->name('news.update');
    Route::get('news/delete', 'delete')->name('news.delete');
});
// ログインしなくても閲覧可能な、ニュース記事一覧
use App\Http\Controllers\NewsController as PublicNewsController;
Route::get('/', [PublicNewsController::class, 'index'])->name('news.index');


/* 課題提出
Route::controller(AAAController::class)->group(function()
{
    Route::get('XXX', 'bbb');
});
*/

// 課題（プロフィール）
use App\Http\Controllers\Admin\ProfileController;
Route::controller(ProfileController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() 
{
    // 管理者としてログインしないと操作できないもの
    Route::get('profile/create', 'add')->name('profile.add');
    Route::post('profile/create', 'create')->name('profile.create');
    Route::get('profile/edit', 'edit')->name('profile.edit');
    Route::post('profile/edit', 'update')->name('profile.edit');
    Route::get('profile/delete', 'delete')->name('profile.delete');
});
// ログインしなくても閲覧可能な、プロフィール情報
use App\Http\Controllers\ProfileController as PublicProfileController;
Route::get('/profile', [PublicProfileController::class, 'index'])->name('profile.index');

    
// 認証部分
Auth::routes();
// ログイン後のページとして残しておこう
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


