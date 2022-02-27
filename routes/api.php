<?php

use App\Http\Controllers\api\dashboard\ArticleCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
route::post('login', [App\Http\Controllers\api\auth\LoginController::class, 'Login']);
route::post('logout', [App\Http\Controllers\api\auth\LoginController::class, 'Logout'])->middleware('auth:sanctum');

Route::group(['middleware' => ['auth:sanctum', 'role:superadministrator'],], function () {
Route::get('category/{category}/article', dashboard\ArticleCategoryController::class);
Route::get('Categories', dashboard\CategoriesController::class);
Route::post('article/{article}', dashboard\ArticleUpdateController::class);
});
