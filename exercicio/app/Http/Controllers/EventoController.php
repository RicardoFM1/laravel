<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventoRequest;
use Illuminate\Http\Request;
use App\Models\Evento;
use Illuminate\Validation\Rule;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listar(Request $request)
    {
        $consulta = Evento::query()->with("ingressos");
        
        $filtro = $request->get("filtro");
        if(!empty($filtro)){
            $consulta->where("nome", "like", "%" . $filtro . "%");
        }
        
        $eventos = $consulta->get();


        return ['message' => "listando os eventos do sistema", 'eventos' => $eventos->toArray()];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function buscar(string $id)
    {
        $consulta = Evento::query();

        $consulta->where("id", $id);

        // dd($consulta->toRawSql());

        $evento = $consulta->get()->first();
        

        return ["message" => "listando o evento do sistema", "eventos" => $evento];
    }

    /**
     * Display the specified resource.
     */
    public function criar(EventoRequest $request)
    {
       

        $validado = $request->all();
       
       $evento = new Evento;
       $evento->nome = $validado["nome"];
       $evento->data_inicio = $validado["data_inicio"];
       $evento->data_fim = $validado["data_fim"];
       $evento->save();

       return ["message" => "evento criado com sucesso!"];
    }

   
    public function editar(Request $request, string $id)
    {
         $validado = $request->validate([
            'nome' => [
            'required'
        ], 
        "data_inicio" => [
             Rule::date()->format("Y-m-d"), 
             "required"
        ],
        "data_fim" => [
            Rule::date()->format("Y-m-d"), 
            "required", 
            "after:data_inicio"
        ]
        ]
    );
       
       
       $evento = Evento::find($id);
       $evento->nome = $validado["nome"];
       $evento->data_inicio = $validado["data_inicio"];
       $evento->data_fim = $validado["data_fim"];
       $evento->save();

       return ["message" => "evento atualizado com sucesso!"];
}
 public function excluir(Request $request, string $id){
    $evento = Evento::find($id);
    $evento->delete();

    return ["message" => "evento excluido com sucesso!"];
 }
}
