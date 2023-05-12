<?php

namespace App\Services;

use App\Models\EmpresaAssinatura;
use App\Services\MoneyFlow\MoneyFlowService;

class AssinaturaService
{
    /**
     * @todo Criar assiantura por aqui, tirar do controlador a assinatura Eduzz
     *
     * @param array $nfse
     * @param array<array|NFSeItemServico> $itensServico
     * @return NFSe|null
     */
    public function create()
    {

    }

    public function renovar(EmpresaAssinatura $assinatura)
    {
        $assinaturaDriver = (new MoneyFlowService($assinatura->driver))->driver()->assinaturaDriver();

        // Verificar a data de vencimento
        // Se passou verificar no driver se foi renovado
        // Se renovou atualizar os saldos nas features
    }
}
