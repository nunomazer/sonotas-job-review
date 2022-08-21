<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Services\ClienteService;

class ClientesController extends Controller
{
    protected ClienteService $clienteService;

    public function __construct()
    {
        $this->clienteService = new ClienteService();
    }

    public function index()
    {
        $clientes = Cliente::whereIn('empresa_id', auth()->user()->empresasIdsArray())->get();
        return view('pages.clientes.list', compact('clientes'));
    }


}
