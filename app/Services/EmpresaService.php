<?php

namespace App\Services;

use App\Events\EmpresaAlteradaEvent;
use App\Events\EmpresaCriadaEvent;
use App\Models\Empresa;
use App\Models\EmpresaNFSConfig;
use App\Models\Role;
use App\Models\User;
use App\Models\UserEmpresa;
use App\Services\Integra\IntegraService;
use App\Services\Integra\Platform;
use App\Services\Sped\SpedService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

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
}
