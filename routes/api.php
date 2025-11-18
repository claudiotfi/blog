<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth:sanctum', 'admin'])->group(function () {
    
    // API de Posts
    Route::apiResource('posts', PostController::class);
    
    // API de Categories
    Route::apiResource('categories', CategoryController::class);
    
    // API de Tags
    Route::apiResource('tags', TagController::class);
    
    // Estatísticas
    Route::get('stats', function () {
        return response()->json([
            'posts' => \App\Models\Post::count(),
            'categories' => \App\Models\Category::count(),
            'tags' => \App\Models\Tag::count(),
            'views' => \App\Models\Post::sum('views'),
        ]);
    });
});