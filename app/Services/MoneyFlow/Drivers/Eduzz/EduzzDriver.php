<?php

namespace App\Services\MoneyFlow\Drivers\Eduzz;

use App\Services\MoneyFlow\IMoneyFlowAssinatura;
use App\Services\MoneyFlow\IMoneyFlowCartaoCredito;
use App\Services\MoneyFlow\IMoneyFlowDriver;
use App\Services\MoneyFlow\IMoneyFlowPlano;

class EduzzDriver implements IMoneyFlowDriver
{
    public function nome(): string
    {
        return 'eduzz';
    }


    public function planoDriver(): IMoneyFlowPlano
    {
        return new EduzzPlano();
    }

    public function cartaoCreditoDriver(): IMoneyFlowCartaoCredito
    {
        return new EduzzCartaoCredito();
    }

    public function assinaturaDriver(): IMoneyFlowAssinatura
    {
        return new EduzzAssinatura();
    }
}
