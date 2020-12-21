<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['api']], function(){
    Route::resource('users', 'App\Http\Controllers\Api\UserController',['except' => ['create', 'edit']]);
});

Route::group(['middleware' => ['api']], function(){
    Route::resource('articles', 'App\Http\Controllers\Api\ArticleController',['except' => ['create', 'edit']]);
});

Route::group(['middleware' => ['api']], function(){
    Route::resource('questions', 'App\Http\Controllers\Api\QuestionController',['except' => ['create', 'edit']]);
});

Route::group(['middleware' => ['api']], function(){
// APIで画像が送られてきたときの処理
    Route::post('upload_file', [App\Http\Controllers\Api\ArticleController::class, 'image_store']);
});

Route::group(['middleware' => ['api']], function(){
// APIで画像が送られてきたときの処理
    Route::post('upload_user_image/{id}', [App\Http\Controllers\Api\UserController::class, 'image_store']);
});
