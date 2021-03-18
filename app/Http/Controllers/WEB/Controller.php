<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    public function index()
    {
        return response()->json(['Interface WEB desativada'], 404);
    }
}
