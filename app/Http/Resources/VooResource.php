<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VooResource extends JsonResource
{
    public function __construct($resource, $grupos = [])
    {
        parent::__construct($resource);
        $this->resource = $resource;
        $this->grupos = collect($grupos);
    }

    /**
     * Transforma Resource em array de retorno
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $grupoMaisBarato = $this->grupos->first();

        return [
            "flights" => $this->resource,
            "groups" => collect($this->grupos),
            "totalGroups" => $this->grupos->count(),
            "totalFlights" => count($this->resource),
            "cheapestPrice" => $grupoMaisBarato['totalPrice'],
            "cheapestGroup" => $grupoMaisBarato['uniqueId']
        ];
    }
}
