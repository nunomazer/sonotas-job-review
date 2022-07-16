<?php

namespace App\Services\Sped;

use App\Models\NFSe;

interface ISpedNFSe
{
    public function toArray() : array;
    public function emitir(NFSe $NFSe);
}
