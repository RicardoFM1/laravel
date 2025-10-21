<?php

use App\Http\Controllers\EventoController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view("Welcome");
});

