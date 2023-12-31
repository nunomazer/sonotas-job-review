<?php

namespace App\Services\MoneyFlow;

interface IMoneyFlowDriver
{
    /**
     * Retorna o nome do driver, ele é usado para instanciar o driver quando necessário e também para gravar esta informação
     * junto ao registro
     *
     * @return string
     */
    public function nome() : string;

    /**
     * Retorna o objeto concreto do driver MoneyFlow correto para trabalhar com planos ou cobranças recorrentes
     *
     * @return IMoneyFlowPlano
     */
    public function planoDriver() : IMoneyFlowPlano;

    /**
     * Retorna o objeto concreto do driver MoneyFlow correto para trabalhar com Cartões de Crédito
     *
     * @return IMoneyFlowCartaoCredito
     */
    public function cartaoCreditoDriver() : IMoneyFlowCartaoCredito;

    /**
     * Retorna o objeto concreto do driver MoneyFlow correto para trabalhar com Assinaturas de Cobranças Recorrentes
     *
     * @return IMoneyFlowAssinatura
     */
    public function assinaturaDriver() : IMoneyFlowAssinatura;

}
