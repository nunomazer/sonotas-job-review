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
     * @return IMoneyFlowDriver
     */
    public function driver(): IMoneyFlowDriver
    {
        return $this->driver;
    }
}
