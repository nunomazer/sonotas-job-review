<?php

namespace App\Services\MoneyFlow;

use App\Models\Plan;

interface IMoneyFlowPlano
{
    /**
     * Atualiza ou cria um novo plano na plataforma integrada. Pelo nome base do plano. Para plataformas onde cada plano
     * tem uma cobrança em período específico, como mensal ou trimestral, esta rotina deve criar planos com nomes
     * que identifiquem esta divisão pois a modelagem prevê campos de valores para estes períodos.
     *
     * @param Plan $plan
     * @return Plan
     */
    public function updateOrCreate(Plan $plan) : Plan;
}
