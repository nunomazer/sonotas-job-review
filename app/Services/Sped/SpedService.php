<?php

namespace App\Services\Sped;

use App\Models\Empresa;
use App\Models\NFSe;

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
     * @return ISpedDriver
     */
    public function driver(): ISpedDriver
    {
        return $this->driver;
    }

    public function certificado() : ISpedCertificado
    {
        return $this->driver->certificado();
    }

    /**
     * Retorna o objeto concreto do driver Sped correto para trabalhar com empresa e a API Sped
     *
     * @param Empresa $empresa model eloquent da Empresa
     * @return ISpedEmpresa
     */
    public function empresaDriver(Empresa $empresa) : ISpedEmpresa
    {
        return $this->driver->empresaDriver($empresa);
    }

    /**
     * Retorna o objeto concreto do driver Sped correto para trabalhar com NFSe e a API Sped
     *
     * @param NFSe $nfse
     * @return ISpedNFSe
     */
    public function nfseDriver(NFSe $nfse) : ISpedNFSe
    {
        return $this->driver->nfseDriver($nfse);
    }
}
