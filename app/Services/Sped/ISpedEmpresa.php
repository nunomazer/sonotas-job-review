<?php

namespace App\Services\Sped;

use App\Models\Cliente;
use App\Models\Empresa;

interface ISpedEmpresa
{
    /**
     * Cadastra uma nova empresa cliente (cliente do nosso cliente) no sistema emissor.
     *
     * @param Cliente $cliente
     * @return string
     */
    public function cadastrarCliente(Cliente $cliente): bool;

    /**
     * Cadastra uma nova empresa (Nosso cliente) no sistema emissor.
     *
     * @param Empresa $empresa
     * @return string
     */
    public function cadastrarEmpresa(Empresa $empresa): string;

    /**
     * Alterar uma empresa (Nosso cliente) no sistema emissor.
     *
     * @param Empresa $empresa
     * @return string
     */
    public function alterarEmpresa(Empresa $empresa): string;
}
