<?php

use Illuminate\Support\Facades\Route;

// Redirecionar todas as requisições WEB para o mesmo lugar
Route::get('/', 'WEB\Controller@index');
Route::get('/{any}', 'WEB\Controller@index');
