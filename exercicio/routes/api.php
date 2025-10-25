<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\EventoController;
use Illuminate\Console\Scheduling\Event;
use App\Http\Controllers\IngressosController;
use App\Http\Requests\IngressoRequest;

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

Route::prefix("/ingressos") -> group((function (){
    Route::get("", [IngressosController::class, 'listar']);
    Route::get("{eventoId}", [IngressosController::class, 'buscarPorEventoId']);
    Route::get("/buscar/{ingressoId}", [IngressosController::class, 'buscarPorIngressoId']);
    Route::put("/editar/{ingressoId}", [IngressosController::class, 'editar']);
    Route::delete("/deletar/{ingressoId}", [IngressosController::class, "deletar"]);
    Route::post("{eventoId}", [IngressosController::class, 'criar']);
}));
