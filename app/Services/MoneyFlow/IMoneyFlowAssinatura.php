<?php

namespace App\Services\MoneyFlow;

use App\Models\Empresa;
use App\Models\EmpresaAssinatura;
use App\Models\Plan;
use PhpParser\Node\Scalar\String_;

interface IMoneyFlowAssinatura
{
    /**
     * Cria uma nova assinatura, ou cobrança recorrente no driver de cobrança
     *
     * @param Empresa $empresa
     * @param EmpresaAssinatura $assinatura Model de assinatura pronto que já deve existir como registro no banco de dados
     * @param array config Configurações para a assinatura:<br/>
     * <pre>
     * [
     *    'cartao_credito': 'string com o token'
     * ]
     * </pre>
     * @return EmpresaAssinatura
     */
    public function create(Empresa $empresa, EmpresaAssinatura $assinatura, array $config) : ?EmpresaAssinatura;

    /**
     * Retorna o nome do status da assinatura
     *
     * @param EmpresaAssinatura $assinatura
     * @return string
     */
    public function getStatusNome(EmpresaAssinatura $assinatura) : string;
}
