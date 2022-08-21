<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
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

    public function create()
    {
        $empresas = auth()->user()->empresas;
        return view('pages.clientes.edit', compact('empresas'));
    }

    public function store(ClienteRequest $request)
    {
        $clienteService = new ClienteService();

        $cliente = $clienteService->create($request->all());

        return redirect()->route('clientes.list', )
            ->with(['success' => 'Cliente criado com successo !']);
    }
}
