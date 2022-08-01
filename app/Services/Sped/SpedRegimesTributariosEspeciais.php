<?php

namespace App\Services\Sped;

class SpedRegimesTributariosEspeciais
{
    const NENHUM = 0;
    const MICRO_EMPRESA_MUNICIPAL = 1;
    const ESTIMATIVA = 2;
    const SOCIEDADE_PROFISSIONAIS = 3;
    const COOPERATIVA = 4;
    const MEI = 5;
    const ME_MEPP = 6;

    private static $regimes = [
        [
            'nome' => 'Nenhum',
            'valor'=> 0,
        ],
        [
            'nome' => 'Micro Empresa Municipal',
            'valor'=> 1,
        ],
        [
            'nome' => 'Estimativa',
            'valor'=> 2,
        ],
        [
            'nome' => 'Sociedade de Profissionais',
            'valor'=> 3,
        ],
        [
            'nome' => 'Cooperativa',
            'valor'=> 4,
        ],
        [
            'nome' => 'MEI',
            'valor'=> 5,
        ],
        [
            'nome' => 'MEI MEPP',
            'valor'=> 6,
        ],
    ];

    public static function toArray()
    {
        return self::$regimes;
    }

    public static function toArrayNomes()
    {
        return array_column(self::$regimes, 'nome');
    }

    public static function toArrayValores()
    {
        return array_column(self::$regimes, 'valor');
    }

    /**
     * Retorna o nome do regime pelo seu valor associado
     *
     * @param array[] $regimes
     */
    public static function getNome(int $valor): string
    {
        foreach (self::$regimes as $regime) {
            if ($regime['valor'] == $valor) return $regime['nome'];
        }

        return false;
    }
}
