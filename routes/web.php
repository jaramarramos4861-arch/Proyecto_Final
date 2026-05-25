<?php

use App\Http\Controllers\Paletas;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarritoController;
use Illuminate\Support\Facades\Route;

// Página principal = productos
Route::get('/', [Paletas::class, 'index'])->name('home');
Route::get('/productos', [Paletas::class, 'index'])->name('productos.index');
Route::get('/productos/{paleta}', [Paletas::class, 'show'])->name('productos.show');

// Autenticación
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Carrito (requiere login)
Route::middleware(['auth'])->group(function () {
    Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
    Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::put('/carrito/actualizar/{id}', [CarritoController::class, 'actualizar'])->name('carrito.actualizar');
    Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
    Route::post('/carrito/comprar', [CarritoController::class, 'comprar'])->name('carrito.comprar');
});

// ADMIN - Gestión de productos (CRUD completo)
Route::middleware(['auth'])->group(function () {
    Route::resource('paletas', Paletas::class)->middleware('admin');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/admin/usuarios', [AdminController::class, 'usuarios'])->name('admin.usuarios')->middleware('admin');
});