<?php

use App\Http\Controllers\dashboard\ArticleController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\UserController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


route::group(['prefix'=>'dashboard','middleware'=>['role:superadministrator'],'namespace'=> 'dashboard','as'=>'admin.'],function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('home');
    route::resource('user', UserController::class)->except(['destroy']);
    Route::post('user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    route::resource('category', CategoryController::class)->except([ 'destroy']);
    Route::post('category/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::post('category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    route::resource('article', ArticleController::class)->except(['destroy']);
    Route::post('article/{article}', [ArticleController::class,'update'])->name('article.update');
    Route::post('article/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');


});
