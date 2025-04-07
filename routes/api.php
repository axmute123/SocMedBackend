<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AuthController;


Route::prefix('posts')->group(function() {
   
    Route::get('/', [PostController::class, 'index']); 
    Route::post('/', [PostController::class, 'store']); 
    Route::get('/{post_id}', [PostController::class, 'show']); 
    Route::patch('/{post_id}', [PostController::class, 'update']); 
    Route::delete('/{post_id}', [PostController::class, 'destroy']); 
});
Route::prefix('postcomment')->group(function() {
   
    Route::get('/', [PostCommentController::class, 'index']); 
    Route::post('/', [PostCommentController::class, 'store']); 
    Route::get('/{post_comment_id}', [PostCommentController::class, 'show']); 
    Route::patch('/{post_comment_id}', [PostCommentController::class, 'update']); 
    Route::delete('/{post_comment_id}', [PostCommentController::class, 'destroy']); 
});
Route::prefix('user')->group(function() {
   
    Route::get('/', [UserController::class, 'index']); 
    Route::post('/', [UserController::class, 'store']); 
    Route::get('/{user_id}', [UserController::class, 'show']); 
    Route::patch('/{user_id}', [UserController::class, 'update']); 
    Route::delete('/{user_id}', [UserController::class, 'destroy']); 
});

Route::prefix('video')->group(function() {
   
    Route::get('/', [VideoController::class, 'index']); 
    Route::post('/', [VideoController::class, 'store']); 
    Route::get('/{video_id}', [VideoController::class, 'show']); 
    Route::patch('/{video_id}', [VideoController::class, 'update']); 
    Route::delete('/{video_id}', [VideoController::class, 'destroy']); 
});

