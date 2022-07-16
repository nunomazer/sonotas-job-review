<?php

namespace App\Services\Sped;

use App\Models\Cliente;
use App\Models\Empresa;

interface ISpedCliente
{

    /**
     * Cadastra uma nova empresacliente (Cliente de nosso cliente) no sistema emissor.
     *
     * @param Cliente $cliente
     * @return string
     */
    public function cadastrar(Cliente $cliente): string;

    /**
     * Alterar uma empresa cliente ( cliente de nosso cliente) no sistema emissor.
     *
     * @param Cliente $cliente
     * @return string
     */
    public function alterar(Cliente $cliente): string;

    /**
     * Monta o array para enviar a cadastros ou envio da NF, de acordo com o driver correto
     *
     * @param Cliente $cliente
     * @return array
     */
    public function toArray(Cliente $cliente) : array;
}
