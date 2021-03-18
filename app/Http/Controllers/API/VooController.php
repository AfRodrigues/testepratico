<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\VooResource;
use App\Models\Voo;
use App\Services\VooService;
use Illuminate\Http\Request;

class VooController extends Controller
{
    private $service;

    public function __construct(VooService $vooService)
    {
        $this->service = $vooService;
    }

    public function index(Request $request)
    {
        // Conecta a API e recupera alista de itens
        $voos = $this->service->getVoos();

        // Agrupar os voos por tarifa e tipo (IDA e VOLTA)
        $gruposTarifa = Voo::agruparPorTarifa($voos);

        // Formatar os vôos
        $resposta = Voo::formatarVoos($gruposTarifa);

        // Padronizar a resposta de acordos com os requisitos da avaliação
        return (new VooResource($voos, $resposta))->toArray($request);

    }
}
