<?php

use App\Http\Controllers\Paletas;
use Illuminate\Support\Facades\Route;
Route::resource('/Paletas', Paletas::class);

Route::get('/', function () {
    return view('welcome');
});
