<?php

namespace App\Services\Sped;

use App\Models\Empresa;

class SpedService
{
    const DOCTYPE_NFSE = 'nfse';
    const DOCTYPE_NFE = 'nfe';

    /**
     * Nome do driver que é instanciado pelo tipo do documento e nome da cidade, de acordo com arquivo config     *
     * @var ISpedDriver
     */
    protected ISpedDriver $driver;

    public function __construct(string $docType, $cidade = null)
    {
        $cityDriver = 'sped.' . $docType . '.cidades.' . $cidade??'nenhuma';
        $defaultDriver = config('sped.' . $docType . '.default');
        $driverName = config($cityDriver, $defaultDriver);
        $driverClass = config('sped.drivers.' . $driverName . '.base_class');
        if (!class_exists($driverClass)) {
            throw new \Exception("Sped driver {$driverClass} não existe !!");
        }

        $this->driver = new $driverClass();
    }


    /**
     * @return string
     */
    public function getDriver(): ISpedDriver
    {
        return $this->driver;
    }

    public function certificado() : ISpedCertificado
    {
        return $this->driver->certificado();
    }

    public function empresa(Empresa $empresa) : ISpedEmpresa
    {
        return $this->driver->empresa();
    }

    public function nfse() : ISpedNFSe
    {
        return $this->driver->nfse();
    }
}
