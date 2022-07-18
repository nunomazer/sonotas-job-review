<?php

namespace App\Services\Sped;

use App\Models\Empresa;
use App\Services\Sped\ISpedEmpresa;

abstract class SpedEmpresa implements ISpedEmpresa
{
    protected $empresa;

    public function __construct(Empresa $empresa)
    {
        $this->empresa = $empresa;
    }
}
