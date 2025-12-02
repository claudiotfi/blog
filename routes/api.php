<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;

// Auth do administrador
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/admin/me', function () {
    return auth()->user();
})->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->prefix('admin')->group(function() {

    Route::get('/posts', [PostController::class, 'index']);
    Route::get('/categories', [CategoryController::class, 'index']);

});

