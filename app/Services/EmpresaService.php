<?php

namespace App\Services;

use App\Events\EmpresaAlteradaEvent;
use App\Events\EmpresaCriadaEvent;
use App\Models\CartaoCredito;
use App\Models\Empresa;
use App\Models\EmpresaAssinatura;
use App\Models\EmpresaNFSConfig;
use App\Models\NFSe;
use App\Models\Plan;
use App\Models\Role;
use App\Models\User;
use App\Models\UserEmpresa;
use App\Services\Integra\IntegraService;
use App\Services\Integra\Platform;
use App\Services\MoneyFlow\MoneyFlowService;
use App\Services\Sped\SpedService;
use App\Services\Sped\SpedStatus;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class EmpresaService
{
    /**
     * Cria um novo registro de empresa no banco de dados
     *
     * @param $empresa
     * @return Empresa
     */
    public function create(array $empresa) : Empresa
    {
        DB::beginTransaction();
            $empresa = Empresa::create($empresa);

            $userEmpresa = UserEmpresa::create([
                'user_id' => $empresa->owner_user_id,
                'empresa_id' => $empresa->id,
            ]);

            $role = Role::findByName(Role::OWNER);
            $empresa->owner->assignRole($role);

        DB::commit();

        EmpresaCriadaEvent::dispatch($empresa);

        return $empresa;
    }

    /**
     * Altera o registro de empresa no banco de dados
     * @param $empresa
     * @return Empresa
     */
    public function update(Empresa $empresa) : Empresa
    {
        $empresa->save();

        EmpresaAlteradaEvent::dispatch($empresa);

        return $empresa;
    }

    /**
     * Cria o registro de configuração padrão para a NFSe da Empresa
     *
     * @param Empresa $empresa
     * @param array $nfseConfig
     * @return Empresa
     */
    public function createConfigNFSe(Empresa $empresa, array $nfseConfig) : Empresa
    {
        $empresa->configuracao_nfse()->create($nfseConfig);

        EmpresaAlteradaEvent::dispatch($empresa);

        return $empresa;
    }

    /**
     * Altera o registro de configuração padrão para a NFSe da Empresa
     *
     * @param Empresa $empresa
     * @param array $nfseConfig
     * @return Empresa
     */
    public function updateConfigNFSe(Empresa $empresa, EmpresaNFSConfig $nfseConfig) : Empresa
    {
        $empresa->configuracao_nfse->update($nfseConfig->toArray());

        EmpresaAlteradaEvent::dispatch($empresa);

        return $empresa;
    }

    /**
     * Cadastra a empresa nos serviços Sped (driver) para cada tipo de documento e cidade
     *
     * @param Empresa $empresa
     * @return void
     */
    public function cadastrarSped(Empresa $empresa)
    {
        $sped = new SpedService(SpedService::DOCTYPE_NFSE, $empresa->cidade->name);
        $driverNFSe = $sped->empresaDriver($empresa);
        $driverNFSe->cadastrar();
    }

    /**
     * Altera a empresa nos serviços Sped para cada tipo de documento e cidade
     *
     * @param Empresa $empresa
     * @return void
     */
    public function alterarSped(Empresa $empresa)
    {
        $sped = new SpedService(SpedService::DOCTYPE_NFSE, $empresa->cidade->name);
        $driverNFSe = $sped->empresaDriver($empresa);
        $driverNFSe->alterar();
    }

    /**
     * Resolve e retorna uma instância para o driver de integração da plataforma informada
     *
     * @param Empresa $empresa
     * @param string $driver Nome do driver da plataforma
     * @return Platform
     * @throws \Throwable
     */
    public function driverIntegracao(Empresa $empresa, string $driver) : Platform
    {
        $empresaIntegracao = $empresa->integracoes()->where('driver', $driver)->first();

        throw_if($empresaIntegracao== null, "Integração {$driver} não encontrada para a empresa {$empresa->nome}");

        return (new IntegraService())->driver($driver, $empresaIntegracao->fields);
    }

    /**
     * Retorna a lista de empresas que o usuário é proprietário na plataforma
     *
     * @param User $user
     * @return Collection
     */
    public function getEmpresasOwner(User $user) : Collection
    {
        return Empresa::where('owner_user_id', $user->id)->get();
    }

    /**
     * Marca uma assinatura como desativada, pode ser por motivos de escolha do cliente ou por estar criando uma
     * nova assinatura
     *
     * @param Empresa $empresa
     * @param EmpresaAssinatura $assinatura
     * @return Empresa
     */
    public function cancelAssinatura(Empresa $empresa, EmpresaAssinatura $assinatura) : Empresa
    {
        //$assinatura-> = false;
        $assinatura->save();


    }

    public function createAssinatura(Empresa $empresa, Plan $plan, CartaoCredito $cc) : Empresa
    {
        $moneyFlowService = new MoneyFlowService();

        $assinaturaAnterior = $empresa->assinatura;

        if ($assinaturaAnterior) {
            $this->cancelAssinatura($empresa, $assinaturaAnterior);
        }

        $cartaoDriver = $moneyFlowService->cartaoCreditoDriver();
        $token = $cartaoDriver->tokenize($cc->holder, $cc->number, $cc->validate, $cc->security_code);

        $assinatura = EmpresaAssinatura::create([
            'empresa_id' => $empresa->id,
            'plan_id' => $plan->id,
        ]);

        $assinaturaDriver = $moneyFlowService->assinaturaDriver();
        $result = $assinaturaDriver->create($empresa, $assinatura, ['cartao_credito'=>$token]);

        return $empresa;
    }

    /**
     * Atualiza os status de todas as notas que estejam em uma das situações intermediárias
     * (não finais como processado, finalizado, etc .. de acordo com o driver). Orquestra esta atualização
     * chamando corretamente os drivers de cada documento fiscal emitido, e realiza as alterações nos registros de banco
     * de dados.
     *
     * Este método deve ser executado por processamento em batch de linha de comando
     * ou filas
     *
     * @param Empresa $empresa
     * @return void
     */
    public function atualizarStatusDocsProcessamento(Empresa $empresa)
    {
        // TODO refatorar para os demais tipos fiscais quando implementados

        $nfses = NFSe::where('status', SpedStatus::PROCESSAMENTO)
            ->get();

        $spedService = new SpedService(SpedService::DOCTYPE_NFSE, $empresa->cidade->name);

        $nfses->each(function ($doc) use ($empresa, $spedService){
            try {
                $nfseDriver = $spedService->nfseDriver($doc);

                $docDriver = $nfseDriver->consultar();

                // TODO mapear corretamente pq pode ter outros drivers com status diferentes, driver deve mandar mapeado
                // TODO mover esta lógica para o NFSeService
                $doc->status = Str::lower($docDriver['status']);
                $doc->status_historico = (new NFSeService())->addStatusDados($doc, $doc->status, $docDriver);
                $doc->save();
            } catch (\Exception $exception) {
                Log::error('Erro ao consultar NFSe Driver');
                Log::error($exception);
            }
        });

    }
}
