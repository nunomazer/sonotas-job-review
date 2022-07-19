<?php

namespace App\Services\Integra;

interface IIntegraDriver
{
    /**
     * Inicia o driver com o array de campos de configuração para conexão e chamadas
     * @param array $config
     */
    public function __construct(array $config);

    public function name() : string;

    public function fields() : array;

    public function toArray() : array;

    /**
     * Recupera da plataforma integrada a lista de serviços, no formato de um array de models Servico
     *
     * @return array
     */
    public function getServicos() : array;
}
