<?php

use Illuminate\Http\Request;
use App\Http\Controllers\api\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts',[PostController::class,'getAllPosts']);
Route::post('/posts',[PostController::class,'addAPost']);
Route::put('/posts/edit/{id}',[PostController::class,'editPost']);
Route::delete('/posts/delete/{id}',[PostController::class,'deletePost']);