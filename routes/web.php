<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\PostController;
use App\Http\Controllers\Admin\AuthController;

Route::get('/teste', function() { return 'ok'; });

// --- SITE PÚBLICO ---
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/post/{slug}', [PostController::class, 'show'])->name('post.show');

// --- ADMIN AUTH (login/logout)
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/admin/me', function () { return auth()->user(); })->middleware('auth:sanctum');

// --- ADMIN SPA (Vue) catch-all — deve vir POR ÚLTIMO
Route::view('/admin/{any}', 'admin.app')->where('any', '.*');
Route::view('/admin', 'admin.app');


// Retorna usuário logado
Route::get('/admin/me', function () {
    return auth()->user();
})->middleware('auth:sanctum');
