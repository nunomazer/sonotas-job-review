<?php

namespace App\Services\Sped;

use App\Models\Cliente;
use App\Models\Empresa;

interface ISpedEmpresa
{

    /**
     * Cadastra uma nova empresa (Nosso cliente) no sistema emissor.
     *
     * @param Empresa $empresa
     * @return string
     */
    public function cadastrar(Empresa $empresa): string;

    /**
     * Alterar uma empresa (Nosso cliente) no sistema emissor.
     *
     * @param Empresa $empresa
     * @return string
     */
    public function alterar(Empresa $empresa): string;
}
