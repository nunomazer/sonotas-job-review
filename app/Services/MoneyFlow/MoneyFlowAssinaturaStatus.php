<?php

namespace App\Services\MoneyFlow;

class MoneyFlowAssinaturaStatus
{
    const ATIVA = 1;
    const DESATIVADA = 2;
    const ATRASADA = 3;
    const PENDENTE = 4;
    const INADIMPLENTE = 5;
    const ENCERRADA = 6;

    private static $status = [
        [
            'nome' => 'Ativa',
            'valor'=> 1,
        ],
        [
            'nome' => 'Desativada',
            'valor'=> 2,
        ],
        [
            'nome' => 'Atrasada',
            'valor'=> 3,
        ],
        [
            'nome' => 'Pendente',
            'valor'=> 4,
        ],
        [
            'nome' => 'Inadimplente',
            'valor'=> 5,
        ],
        [
            'nome' => 'Encerrada',
            'valor'=> 6,
        ],
    ];

    public static function toArray()
    {
        return self::$status;
    }

    public static function toArrayNomes()
    {
        return array_column(self::$status, 'nome');
    }

    public static function toArrayValores()
    {
        return array_column(self::$status, 'valor');
    }

    /**
     * Retorna o nome do status pelo seu valor associado
     *
     * @param array[] $status
     */
    public static function getNome(int $valor): string
    {
        foreach (self::$status as $regime) {
            if ($regime['valor'] == $valor) return $regime['nome'];
        }

        return false;
    }

    /**
     * Retorna o valor do status pelo seu nome associado
     *
     * @param array[] $status
     */
    public static function getValor(int $nome): string
    {
        foreach (self::$status as $st) {
            if (mb_strtolower($st['nome']) == mb_strtolower($nome)) return $st['valor'];
        }

        return false;
    }
}
