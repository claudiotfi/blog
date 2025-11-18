<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Admin\AuthController;

Route::get('/', [HomeController::class, 'home'])->name('home');

/*
|--------------------------------------------------------------------------
| Rotas API do painel admin (necessitam session + sanctum)
|--------------------------------------------------------------------------
*/

// Auth API (Laravel controllers)
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/admin/me', function () {
    return auth()->user();
})->middleware('auth:sanctum');

/*
|--------------------------------------------------------------------------
| Vue SPA Admin - precisa vir POR ÚLTIMO
|--------------------------------------------------------------------------
*/
Route::view('/admin/{any}', 'admin.app')->where('any', '.*');
Route::view('/admin', 'admin.app');
