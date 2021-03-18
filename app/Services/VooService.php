<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class VooService
{
    private $uri;

    public function __construct()
    {
        $this->uri = config('custom.api.123milhas.uri');
    }


    /**
     * Chamar API da 123Milhas e buscar dados dos vôos
     *
     * @return array
     */
    public function getVoos(){
        // Executa API 123Milhas, SE erro a classe App\Exceptions\Handler trata a exception
        $resposta = Http::get($this->uri);
        return $resposta->json() ?? [];
    }
}
