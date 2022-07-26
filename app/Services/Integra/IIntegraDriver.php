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
     * Retorna o label do campo de pelo seu nome
     * @param string $name
     * @return string
     */
    public function fieldLabel(string $name) : string;

    /**
     * Recupera da plataforma integrada a lista de serviços, no formato de um array de models Servico
     *
     * @return array
     */
    public function getServicos() : array;

    /**
     * Recupera da plataforma integrada a lista de vendas, no formaro de um arrau de models de NFSe.
     * O filtro é realizada por data e hora, porém cada plataforma pode interpretar de maneira diferente e ignorar a hora.
     *
     * @param string $from Data e hora a partir da qual deseja buscar as vendas, formato Y-m-d H:i
     * @param int $page Página que deve ser retornada, referente à paginação
     * @return array
     */
    public function getVendas(string $from, int $page = 1) : array;
}
