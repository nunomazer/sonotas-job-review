<?php

namespace App\Http\Controllers;

use App\DataTables\ClienteDataTable;
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

    public function index(ClienteDataTable $dataTable)
    {
        return $dataTable->render('pages.clientes.list');
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

    public function edit(Cliente $cliente)
    {
        $empresas = auth()->user()->empresas;
        return view('pages.clientes.edit', compact('cliente', 'empresas'));
    }

    public function update(ClienteRequest $request, Cliente $cliente)
    {
        $cliente->fill($request->all());

        $clienteService = new ClienteService();

        $cliente = $clienteService->update($cliente);

        return redirect()->route('clientes.list', )
            ->with(['success' => 'Cliente atualizado com successo !']);
    }


}
