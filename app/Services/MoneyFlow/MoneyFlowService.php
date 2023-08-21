<?php

namespace App\Services\MoneyFlow;

class MoneyFlowService
{
    protected IMoneyFlowDriver $driver;

    public function __construct(string $driverName = 'default')
    {
        if ($driverName == 'default') {
            $driverName = config('moneyflow.' . $driverName);
        }

        $driverClass = config('moneyflow.drivers.' . $driverName . '.base_class');
        if (!class_exists($driverClass)) {
            throw new \Exception("MoneyFlow driver {$driverClass} não existe !!");
        }

        $this->driver = new $driverClass();
    }

    /**
     * Retorna o driver correspondente ao passado como parâmetro na instanciação do MoneyFlowService
     * @return IMoneyFlowDriver
     */
    public function driver(): IMoneyFlowDriver
    {
        return $this->driver;
    }

    /**
     * @return IMoneyFlowPlano
     */
    public function planoDriver() : IMoneyFlowPlano
    {
        return $this->driver->planoDriver();
    }

    /**
     * @return IMoneyFlowCartaoCredito
     */
    public function cartaoCreditoDriver() : IMoneyFlowCartaoCredito
    {
        return $this->driver->cartaoCreditoDriver();
    }

    /**
     * @return IMoneyFlowAssinatura
     */
    public function assinaturaDriver() : IMoneyFlowAssinatura
    {
        return $this->driver->assinaturaDriver();
    }
}
