<?php

namespace App\Services;

use App\Models\Plan;
use App\Services\MoneyFlow\MoneyFlowService;

class PlanoService
{
    public function updateOrCreate(Plan $plan) : Plan
    {
        $planoDriver = (new MoneyFlowService())->planoDriver();

        $plan = Plan::updateOrCreate([
            'name' => $plan->name,
        ], $plan->toArray());

        $plan = $planoDriver->updateOrCreate($plan);

        return $plan;
    }
}
