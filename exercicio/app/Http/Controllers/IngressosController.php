<?php 


namespace App\Http\Controllers;

use App\Http\Requests\IngressoRequest;
use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Ingressos;
use Illuminate\Validation\Rule;

class IngressosController extends Controller

{
   public function listar(Request $request){
    $consulta = Ingressos::query()->with("evento");

    $ingressos = $consulta->get();

    return ["ingressos" => $ingressos->toArray()];
   }  

   public function buscarPorEventoId(int $eventoId){

    $consulta = Ingressos::query();
    $consulta->where("evento_id", $eventoId);

    $ingresso = $consulta->get()->first();

    return ["ingresso" => $ingresso];

   }

   public function buscarPorIngressoId(int $ingressoId){
    $ingresso = Ingressos::findOrFail($ingressoId);

    return ["ingresso" => $ingresso];
   }


   public function criar(IngressoRequest $request, int $eventoId)
   {
    $validado = $request->all();


    $ingresso = new Ingressos();
    $ingresso->evento_id = $eventoId;
    $ingresso->tipo = $validado["tipo"];
    $ingresso->valor = $validado["valor"];
    $ingresso->save();

    return ["message" => "criado com sucesso!"];
   }
   public function editar(IngressoRequest $request, int $ingressoId){
    $ingresso = Ingressos::find($ingressoId);

    $validado = $request->all();
    $ingresso->evento_id = $validado["evento_id"];
    $ingresso->tipo = $validado["tipo"];
    $ingresso->valor = $validado["valor"];
    $ingresso->save();

    return ["message" => "ingresso editado com sucesso!"];

   }
   public function deletar(IngressoRequest $request, int $ingressoId){
    $ingresso = $request::find($ingressoId);
    $ingresso->delete();

    return ["message" => "ingresso deletado com sucesso!"];
   }
}




