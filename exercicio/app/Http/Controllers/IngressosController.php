<?php 


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Ingressos;
use Illuminate\Validation\Rule;

class IngressosController extends Controller

{
   public function listar(Request $request){
    $consulta = Ingressos::query();

    $ingressos = $consulta->get();

    return ["ingressos" => $ingressos->toArray()];
   }  

   public function buscarPorEventoId(int $eventoId){

    $consulta = Ingressos::query();
    $consulta->where("evento_id", $eventoId);

    $ingresso = $consulta->get()->first();

    return ["ingresso" => $ingresso];

   }


   public function criar(Request $request)
   {
    $validado = $request->validate([
        "evento_id" => [
            "required"
        ],
        "tipo" => [
            "required"
        ],
        "valor" => [
            "required"
        ]
    ]);


    $ingresso = new Ingressos();
    $ingresso->evento_id = $validado["evento_id"];
    $ingresso->tipo = $validado["tipo"];
    $ingresso->valor = $validado["valor"];
    $ingresso->save();
   }
}




