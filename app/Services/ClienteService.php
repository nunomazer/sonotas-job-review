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
        $cliente['tipo_logradouro'] = $this->validaTipoLogradouro($cliente);
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

    protected function validaTipoLogradouro(array $cliente) : string
    {
        $tipoLogService = new TipoLogradouroService();

        if (isset($cliente['tipo_logradouro'])) {
            return $tipoLogService->validoOuResolve($cliente['tipo_logradouro'], $cliente['logradouro']);
        }

        return $tipoLogService->resolvePeloLogradouro($cliente['logradouro']);
    }


}
