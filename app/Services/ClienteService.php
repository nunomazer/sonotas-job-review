<?php

namespace App\Services;

use App\Events\ClienteAlteradoEvent;
use App\Events\ClienteCriadoEvent;
use App\Events\EmpresaAlteradaEvent;
use App\Events\EmpresaCriadaEvent;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Services\Sped\SpedService;

class ClienteService
{
    /**
     * Cria um novo registro de cliente de nossos clientes no banco de dados
     * @param $cliente
     * @return Cliente
     */
    public function create($cliente) : Cliente
    {
        $cliente = Cliente::create($cliente);

        ClienteCriadoEvent::dispatch($cliente);

        return $cliente;
    }

    /**
     * Altera o registro de cliente de nossos clientes no banco de dados
     * @param $cliente
     * @return Empresa
     */
    public function update(Cliente $cliente) : Cliente
    {
        $cliente->save();

        ClienteAlteradoEvent::dispatch($cliente);

        return $cliente;
    }

}
