<?php

namespace App\Services\MoneyFlow;

use App\Models\Empresa;
use App\Models\EmpresaAssinatura;

abstract class AbstractMoneyFlowAssinatura implements IMoneyFlowAssinatura
{

    /**
     * @inheritDoc
     */
    public abstract function create(Empresa $empresa, EmpresaAssinatura $assinatura, array $config): ?EmpresaAssinatura;

    /**
     * @inheritDoc
     */
    public function getStatusNome(EmpresaAssinatura $assinatura): string
    {
        if($assinatura->status == null) return 'Sem pagamento identificado';

        return MoneyFlowAssinaturaStatus::getNome($assinatura->status);
    }


}
