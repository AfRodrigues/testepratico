<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Configurações customizadas da aplicação
    |--------------------------------------------------------------------------
    */

    'api' => [
        '123milhas' => [
            'uri' => env('VOO_123MILHAS_URL_BASE', 'http://prova.123milhas.net/api/flights'),
            'key' => null,
        ]
    ],

];
