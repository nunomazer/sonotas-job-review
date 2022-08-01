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
     *    'cartao_credito': [
     *       'numero': '9999999'
     *    ]
     * ]
     * </pre>
     * @return Plan
     */
    public function updateOrCreate(Empresa $empresa, Plan $plan) : Plan;
}
