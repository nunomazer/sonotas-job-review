<?php

namespace App\Services\Sped;

class SpedRegimesTributarios
{
    const ISENTO = 0;
    const SIMPLES_NACIONAL = 1;
    const SIMPLES_NACIONAL_EXCESSO = 2;
    const LUCRO_PRESUMIDO = 3;
    const LUCRO_REAL = 4;
    const MEI = 5;

    private static $regimes = [
        [
            'nome' => 'Isento',
            'valor'=> 0,
        ],
        [
            'nome' => 'Simples Nacional',
            'valor'=> 1,
        ],
        [
            'nome' => 'Simples Nacional Excesso',
            'valor'=> 2,
        ],
        [
            'nome' => 'Lucro Presumido',
            'valor'=> 3,
        ],
        [
            'nome' => 'Lucro Real',
            'valor'=> 4,
        ],
        [
            'nome' => 'MEI',
            'valor'=> 5,
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
            if ($regime['valor'] = $valor) return $regime['nome'];
        }

        return false;
    }
}
