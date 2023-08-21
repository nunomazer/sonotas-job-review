<?php

namespace App\Services;

use App\Events\EmpresaAlteradaEvent;
use App\Events\EmpresaCriadaEvent;
use App\Exceptions\DocumentoDuplicadoCriarEmpresaException;
use App\Models\CartaoCredito;
use App\Models\Empresa;
use App\Models\Integracao;
use App\Models\Webhook;
use App\Models\EmpresaAssinatura;
use App\Models\EmpresaNFSConfig;
use App\Models\NFSe;
use App\Models\Plan;
use App\Models\Certificado;
use App\Models\Role;
use App\Models\User;
use App\Models\UserEmpresa;
use App\Services\Integra\IntegraService;
use App\Services\Integra\Platform;
use App\Services\MoneyFlow\MoneyFlowService;
use App\Services\Sped\SpedService;
use App\Services\Sped\SpedStatus;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class IntegracaoService
{
    /**
     * Cria um novo registro de integração com empresa no banco de dados
     *
     * @param array $integracao
     * @return Integracao
     */
    public function create(array $integracao) : Integracao
    {
        $integracao = Integracao::create($integracao);

        return $integracao;
    }

    /**
     * Altera o registro de integração com empresa no banco de dados
     * @param Integracao $integracao
     * @return Integracao
     */
    public function update(Integracao $integracao) : Integracao
    {
        $integracao->save();

        return $integracao;
    }

}
