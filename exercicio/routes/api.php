<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\EventoController;
use Illuminate\Console\Scheduling\Event;

Route::get('/user', function (Request $request) {
    return json_encode(["message" => "Minha api laravel"]);
});




Route::prefix('/evento')->group((function () {
Route::get('', [EventoController::class, 'listar']);
Route::get('{id}', [EventoController::class, 'buscar']);
Route::post('', [EventoController::class, 'criar']);
Route::get('filtro', [EventoController::class, 'filtrar']);
Route::delete("{id}", [EventoController::class, 'excluir']);

}));
