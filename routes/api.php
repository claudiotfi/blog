<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Posts\PostController;
use App\Http\Controllers\Admin\CategoryController;

// Rotas protegidas do painel admin via SPA
Route::middleware(['auth:sanctum'])->prefix('admin')->group(function () {

    // POSTS
    Route::get('/posts', [PostController::class, 'index']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::get('/posts/{post}', [PostController::class, 'show']);
    Route::put('/posts/{post}', [PostController::class, 'update']);
    Route::delete('/posts/{post}', [PostController::class, 'destroy']);

    // CATEGORIES
    Route::get('/categories', [CategoryController::class, 'index']);
});
