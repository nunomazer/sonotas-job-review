<?php

namespace App\Services\Sped;

use App\Models\NFSe;

abstract class SpedNFSe implements ISpedNFSe
{
    protected $nfse;

    public function __construct(NFSe $nfse)
    {
        $this->nfse = $nfse;
    }
}
