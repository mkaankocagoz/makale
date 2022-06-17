<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ArticleCommentController;
use App\Http\Controllers\Api\UserController;

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

Route::middleware(['auth:sanctum'])->group(function () {

    Route::resource('articles', ArticleController::class);
    Route::resource('comments', CommentController::class);

    Route::get('/comments-by-article/{id}', [ArticleCommentController::class, 'comment']);
    Route::get('/article-by-comment/{id}', [ArticleCommentController::class, 'article']);

    Route::get('/comments-by-user/{id}', [UserController::class, 'comment']);
    Route::get('/articles-by-user/{id}', [UserController::class, 'article']);

    Route::post('/auth/user', [RegisterController::class, 'index']);
});

Route::post('/auth/login/', [LoginController::class, 'index']);