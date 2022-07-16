<?php

namespace App\Services\Sped;

use App\Models\Cliente;
use App\Models\Empresa;

interface ISpedEmpresa
{

    public function __construct(Empresa $empresa);

    /**
     * Cadastra uma nova empresa (Nosso cliente) no sistema emissor.
     *
     * @param Empresa $empresa
     * @return string
     */
    public function cadastrar(): string;

    /**
     * Alterar uma empresa (Nosso cliente) no sistema emissor.
     *
     * @param Empresa $empresa
     * @return string
     */
    public function alterar(): string;

    /**
     * Monta o array para enviar a cadastros ou envio da NF, de acordo com o driver correto
     *
     * @param Empresa $empresa
     * @return array
     */
    public function toArray() : array;
}
