<?php

namespace App\Services;

use App\Models\NFSe;
use App\Services\Sped\SpedService;

class NFSeService
{
    public function create($nfse) : NFSe
    {
        $nfse = NFSe::create($nfse);

        return $nfse;
    }

    public function emitirSped(NFSe $nfse)
    {
        $sped = new SpedService(SpedService::DOCTYPE_NFSE, $nfse->empresa->cidade->name);
        $driverNFSe = $sped->nfse($nfse);
        $result = $driverNFSe->emitir();


    }
}
