<?php

namespace App\Http\Controllers;

use App\Enums\FreteStatus;
use App\Helpers;
use App\Http\Requests\StoreFreteRequest;
use App\Models\Frete;

class FreteController extends Controller
{
    public function store(StoreFreteRequest $request)
    {
        $dados = $request->all();
        $dados['codigo_rastreio'] = Helpers::geraCodigoRastreio();
        $dados['status'] = FreteStatus::EM_TRANSITO;

        $frete = Frete::create($dados);

        return $frete;
    }
}