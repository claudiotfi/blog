<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PhotoController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Posts
    Route::resource('posts', PostController::class);
    Route::post('posts/{post}/publish', [PostController::class, 'publish'])->name('posts.publish');
    
    // Categories
    Route::resource('categories', CategoryController::class);
    
    // Tags
    Route::resource('tags', TagController::class);
    
    // Photos
    Route::post('photos/upload', [PhotoController::class, 'upload'])->name('photos.upload');
    Route::delete('photos/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');
});