<?php

namespace App\Services\MoneyFlow\Drivers\Safe2Pay;

use App\Services\MoneyFlow\IMoneyFlowCartaoCredito;
use App\Services\MoneyFlow\IMoneyFlowDriver;
use App\Services\MoneyFlow\IMoneyFlowPlano;

class Safe2PayDriver implements IMoneyFlowDriver
{
    public function nome(): string
    {
        return 'safe2pay';
    }


    public function planoDriver(): IMoneyFlowPlano
    {
        return new Safe2PayPlano();
    }

    public function cartaoCreditoDriver(): IMoneyFlowCartaoCredito
    {
        return new Safe2PayCartaoCredito();
    }
}
