<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Registro de rotas API da aplicação.
| Middleware grupo padrão: API
|
*/

Route::resource('/v1/voos', 'API\VooController')->only('index');
