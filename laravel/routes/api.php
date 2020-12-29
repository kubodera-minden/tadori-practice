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
    Route::post('upload_user_image/{id}', [App\Http\Controllers\Api\UserController::class, 'image_store']);
});

Route::group(['middleware' => ['api']], function(){
    Route::resource('articles', 'App\Http\Controllers\Api\ArticleController',['except' => ['create', 'edit']]);
    Route::post('upload_file', [App\Http\Controllers\Api\ArticleController::class, 'image_store']);
    Route::post('upload_thumbnail/{id}', [App\Http\Controllers\Api\ArticleController::class, 'thumbnail_store']);
});

Route::group(['middleware' => ['api']], function(){
    Route::resource('questions', 'App\Http\Controllers\Api\QuestionController',['except' => ['create', 'edit']]);
    Route::post('update_question/{id}', [App\Http\Controllers\Api\QuestionController::class, 'update_question']);
});

Route::group(['middleware' => ['api']], function(){
    Route::resource('interviewers', 'App\Http\Controllers\Api\InterviewerController',['except' => ['create', 'edit']]);
    Route::post('upload_interviewer_image/{id}', [App\Http\Controllers\Api\InterviewerController::class, 'image_store']);
});

Route::group(['middleware' => ['api']], function(){
    Route::resource('products', 'App\Http\Controllers\Api\ProductController',['except' => ['create', 'edit']]);
    Route::post('upload_product_image/{id}', [App\Http\Controllers\Api\ProductController::class, 'image_store']);
});