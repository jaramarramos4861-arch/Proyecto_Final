<?php

use App\Http\Controllers\Paletas;
use Illuminate\Support\Facades\Route;

Route::resource('paletas', Paletas::class);

Route::get('/', function () {
    return view('welcome');
});
