<?php

namespace App\Http\Controllers;

use App\Http\Requests\IngressoRequest;
use App\Http\Requests\VendaRequest;
use App\Models\Vendas;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function listar(){
        $consulta = Vendas::query()->with("evento", "ingresso");

        $vendas = $consulta->get();

        return [$vendas->toArray()];
    }
    public function criar(VendaRequest $request){
        $validado = $request->all();

        $venda = new Vendas();
        $venda->ingresso_id = $validado["ingresso_id"];
        $venda->valor = $validado["valor"];
        $venda->evento_id = $validado["evento_id"];
        $venda->cpf = $validado["cpf"];
        $venda->save();

        return [$venda];
    }
}
