<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listar(Request $request)
    {
        $consulta = Evento::query();
        
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
    public function filtrar(Request $request)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
