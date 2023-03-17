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

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\Admin\NewsController;
Route::controller(NewsController::class)->prefix('admin')->group(function() {
    Route::get('news/create', 'add');
});
/* 3、http://XXXXXX.jp/XXXというアクセスが来た時に、
AAAControllerのbbbというAction に渡すRoutingの設定」を書いてみてください
*/
//use App\Http://XXXXXX.jp/XXX;
Route::controller(AAAController::class)->group(function()
{
    Route::get('XXX', 'bbb');
   
   /*　4、前章でAdmin/ProfileControllerを作成し、add Action, edit Actionを追加しました。
web.phpを編集して、admin/profile/create にアクセスしたら ProfileController の 
add Action に、
admin/profile/edit にアクセスしたら
ProfileController の edit Action に割り当てるように設定してください
*/ 
});

use App\Http\Controllers\Admin\ProfileController;
Route::controller(ProfileController::class)->prefix('admin')->group(function() {
    Route::get('profile/create', 'add');
});

use App\Http\Controllers\Admin\Profile2Controller;
Route::controller(ProfileController::class)->prefix('admin')->group(function() {
    Route::get('profile/edit', 'edit');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
