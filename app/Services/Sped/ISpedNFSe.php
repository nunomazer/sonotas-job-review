<?php

namespace App\Services\Sped;

use App\Models\NFSe;

interface ISpedNFSe
{
    public function __construct(NFSe $nfse);
    public function toArray() : array;
    public function emitir();
}
