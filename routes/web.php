<?php

use App\Http\Controllers\Paletas;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// ========== PÁGINA DE INICIO ==========
Route::get('/', [AuthController::class, 'showLogin'])->name('welcome');

// ========== AUTENTICACIÓN ==========
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ========== RUTAS PÚBLICAS ==========
Route::get('/productos', [Paletas::class, 'index'])->name('productos.index');
Route::get('/productos/{paleta}', [Paletas::class, 'show'])->name('productos.show');

// ========== RUTAS PROTEGIDAS PARA ADMIN ==========
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('paletas', Paletas::class);
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/usuarios', [AdminController::class, 'usuarios'])->name('admin.usuarios');
});
