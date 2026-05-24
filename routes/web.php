<?php

use App\Http\Controllers\Paletas;
use Illuminate\Support\Facades\Route;

// Ruta de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Rutas CRUD para paletas
Route::resource('paletas', Paletas::class);