<?php

namespace App\Http\Controllers\Api;

use App\Models\Cliente;
use App\Models\Servico;
use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhooksController extends Controller
{
    public function sped(Request $request, string $driver)
    {
        Log::debug($driver);
        Log::debug('Webhook', $request->all());
    }
}
