<?php

namespace App\Services\Sped;

class SpedRegimesTributarios
{
    static public function nome($regimeTributario)
    {
        switch ($regimeTributario) {
            case self::MEI:
                return 'MEI';
            case self::SIMPLES_NACIONAL:
                return 'Simples Nacional';
            case self::SIMPLES_NACIONAL_EXCESSO:
                return 'Simples Nacional - excesso';
            case self::LUCRO_PRESUMIDO:
                return 'Lucro Presumido';
            case self::LUCRO_REAL:
                return 'Lucro Real';
            default:
                return 'Nenhum';
        }
    }
}
