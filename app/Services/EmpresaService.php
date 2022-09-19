<?php

namespace App\Services;

use App\Events\EmpresaAlteradaEvent;
use App\Events\EmpresaCriadaEvent;
use App\Exceptions\DocumentoDuplicadoCriarEmpresaException;
use App\Models\CartaoCredito;
use App\Models\Empresa;
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
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EmpresaService
{
    protected $disk_docs_fiscais = 'local_docs_fiscais';

    /**
     * Cria um novo registro de empresa no banco de dados
     *
     * @param $empresa
     * @return Empresa
     */
    public function create(array $empresa) : Empresa
    {
        $this->validaCnpjUnicoCriarEmpresa($empresa['documento']);

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

    public function validaCnpjUnicoCriarEmpresa(string $cnpj)
    {
        $empresa = Empresa::where('documento', $cnpj)->first();

        if ($empresa) {
            throw new DocumentoDuplicadoCriarEmpresaException(
                'Empresa com o documento ' . $cnpj . ' já cadastrada. Se você não tem acesso
                a essa empresa solicite ao administrador dela.'
            );
        }

        return true;
    }

    /**
     * Cria o registro de configuração padrão para a NFSe da Empresa
     *
     * @param Empresa $empresa
     * @param array $nfseConfig
     * @param Certificado $certificado
     * @return Empresa
     */
    public function createConfigNFSe(Empresa $empresa, array $nfseConfig, Certificado $certificado = null) : Empresa
    {
        if($certificado != null){
            $nfseConfig['certificado_id'] = $this->handleUploadCertificate($certificado, $empresa->id);
        }

        $empresa->configuracao_nfse()->create($nfseConfig);

        EmpresaAlteradaEvent::dispatch($empresa);

        return $empresa;
    }

    /**
     * Método responsável por realizar o upload e validar o certificado
     *
     * @param Certificado $certificado
     * @param int $empresaID
     * @return int
     */
    public function handleUploadCertificate(Certificado $certificado, $empresaID){
        $name = uniqid(date('HisYmd'));
        $extension = $certificado->file->extension();
        $nameFile = "{$empresaID}-{$name}.{$extension}";
        $uploaded = $certificado->file->storeAs("certificados", $nameFile);

        $pfxContent = Storage::get($uploaded);

        if (!openssl_pkcs12_read($pfxContent, $x509certdata, $certificado->password)) {
            Storage::delete($uploaded);
            throw \Illuminate\Validation\ValidationException::withMessages([
                'certificadoDigital' => ['Senha incorreta ou arquivo de certificado inválido!']
             ]);
        }

        $CertPriv = openssl_x509_parse(openssl_x509_read($x509certdata['cert']));

        if($CertPriv['validTo_time_t'] < time()){
            Storage::delete($uploaded);
            throw \Illuminate\Validation\ValidationException::withMessages([
                'certificadoDigital' => ['O certificado está expirado!']
             ]);
        }

        $certificadoPersistido = Certificado::create([
            'file'          => $uploaded,
            'expires_at'    => gmdate("Y-m-d\TH:i:s\Z", $CertPriv['validTo_time_t']),
            'sped_id'       => "PADRÃO-A-DEFINIR",
            'password'      => $certificado->password
        ]);

        return $certificadoPersistido->id;
    }

    /**
     * Altera o registro de configuração padrão para a NFSe da Empresa
     *
     * @param Empresa $empresa
     * @param EmpresaNFSConfig $nfseConfig
     * @param Certificado $certificado
     * @return Empresa
     */
    public function updateConfigNFSe(Empresa $empresa, EmpresaNFSConfig $nfseConfig, Certificado $certificado = null) : Empresa
    {
        if($certificado != null){
            $nfseConfig->certificado_id = $this->handleUploadCertificate($certificado, $empresa->id);
        }

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
    public function cancelAssinatura(Empresa $empresa, EmpresaAssinatura $assinatura)
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
            ->whereRelation('venda', 'empresa_id', $empresa->id)
            ->get();

        $spedService = new SpedService(SpedService::DOCTYPE_NFSE, $empresa->cidade->name);

        $nfses->each(function ($doc) use ($empresa, $spedService){
            try {
                $nfseDriver = $spedService->nfseDriver($doc);

                $docDriver = $nfseDriver->consultar();

                // TODO mapear corretamente pq pode ter outros drivers com status diferentes, driver deve mandar mapeado
                // TODO mover esta lógica para o NFSeService
                $doc->status = Str::lower($docDriver['status']);
                $doc->arquivo_xml = $doc->id . '_' . $docDriver['xml']['filename'];
                $doc->arquivo_pdf = $doc->id . '_' . $docDriver['pdf']['filename'];
                $doc->disk = $this->disk_docs_fiscais;
                $doc->status_historico = (new NFSeService())->addStatusDados($doc, $doc->status, $docDriver);
                $doc->save();
            } catch (\Exception $exception) {
                Log::error('Erro ao consultar NFSe Driver');
                Log::error($exception);
            }
        });


    }
    /**
     * Download os arquivos XML e PDF de todas as notas que estejam em uma sicuação concluída, porém não foi baixado pdf ou xml.
     * Orquestra esta atualização chamando corretamente os drivers de cada documento fiscal emitido,
     * e realiza as alterações nos registros de banco de dados.
     *
     * Este método deve ser executado por processamento em batch de linha de comando ou filas
     *
     * @param Empresa $empresa
     * @return void
     */
    public function downloadXmlPdfDocsConcluidos(Empresa $empresa)
    {
        // TODO refatorar para os demais tipos fiscais quando implementados

        $nfses = NFSe::where('status', SpedStatus::CONCLUIDO)
            ->whereRelation('venda', 'empresa_id', $empresa->id)
            ->where(function($q) {
                $q->where('arquivo_xml_downloaded', false)
                    ->orWhere('arquivo_pdf_downloaded', false);
            })
            ->get();

        $spedService = new SpedService(SpedService::DOCTYPE_NFSE, $empresa->cidade->name);

        $nfses->each(function ($doc) use ($empresa, $spedService){
            try {
                $nfseDriver = $spedService->nfseDriver($doc);

                // TODO mapear corretamente pq pode ter outros drivers com status diferentes, driver deve mandar mapeado
                // TODO mover esta lógica para o NFSeService

                if ($doc->arquivo_xml_downloaded == false) {
                    $fileString = $nfseDriver->downloadXml();
                    Storage::disk($doc->disk)->put($doc->arquivo_xml, $fileString);
                    $doc->arquivo_xml_downloaded = true;
                }

                if ($doc->arquivo_pdf_downloaded == false) {
                    $fileString = $nfseDriver->downloadPdf();
                    Storage::disk($doc->disk)->put($doc->arquivo_pdf, $fileString);
                    $doc->arquivo_pdf_downloaded = true;
                }

                $doc->save();
            } catch (\Exception $exception) {
                Log::error('Erro ao fazer o download dos arquivos XML e PDF da NFSe Driver');
                Log::error($exception);
            }
        });

    }
}
