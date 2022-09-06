<?php

namespace App\Http\Controllers\Api;

use App\Models\Cliente;
use App\Models\Servico;
use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhooksController extends Controller
{
    public function sped(Request $request, string $driver, string $id)
    {

        Log::debug($driver . ' = ' . $id);
        Log::debug('Wehhook', $request->all());
    }
}
