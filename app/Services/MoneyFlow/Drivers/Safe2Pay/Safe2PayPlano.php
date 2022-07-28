<?php

namespace App\Services\MoneyFlow\Drivers\Safe2Pay;

use App\Models\Plan;
use App\Services\MoneyFlow\IMoneyFlowPlano;

class Safe2PayPlano implements IMoneyFlowPlano
{
    use Safe2PayTrait;

    /**
     * Atualiza ou cria um novo plano na plataforma integrada. Pelo nome base do plano. Para plataformas onde cada plano
     * tem uma cobrança em período específico, como mensal ou trimestral, esta rotina deve criar planos com nomes
     * que identifiquem esta divisão pois a modelagem prevê campos de valores para estes períodos.
     *
     * @param Plan $plan
     * @return void
     */
    public function updateOrCreate(Plan $plan)
    {

    }

}
