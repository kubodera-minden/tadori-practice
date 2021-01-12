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

// ログイン https://blog.proglearn.com/2020/04/21/%E3%80%902020%E5%B9%B44%E6%9C%88-%E6%99%82%E7%82%B9%E3%80%91laravel%E3%81%A7jwt%E8%AA%8D%E8%A8%BC%EF%BC%81-jwt-auth-%E5%B0%8E%E5%85%A5%E6%89%8B%E9%A0%86/
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'App\Http\Controllers\Api\AuthController@login');
});

Route::group([
    'prefix' => 'auth',
    'middleware' => 'auth:api'
], function () {
    Route::post('logout', 'App\Http\Controllers\Api\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\Api\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\Api\AuthController@me');
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