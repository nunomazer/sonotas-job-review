<?php

namespace App\Services\MoneyFlow;

use App\Models\Empresa;
use App\Models\Plan;

interface IMoneyFlowAssinatura
{
    /**
     * Cria uma nova assinatura, ou cobrança recorrente no driver de cobrança
     *
     * @param Empresa $empresa
     * @param Plan $plan
     * @param array config Configurações para a assinatura:<br/>
     * <pre>
     * [
     *    'cartao_credito': 'string com o token'
     * ]
     * </pre>
     * @return Plan
     */
    public function create(Empresa $empresa, Plan $plan, array $config) : ?Plan;
}
