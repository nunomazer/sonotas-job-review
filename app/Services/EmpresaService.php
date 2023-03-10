<?php

namespace App\Services;

use App\Events\EmpresaAlteradaEvent;
use App\Events\EmpresaCriadaEvent;
use App\Exceptions\DocumentoDuplicadoCriarEmpresaException;
use App\Models\CartaoCredito;
use App\Models\Empresa;
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

            $role = Role::findByName(Role::OWNER, 'web');
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
        // se já existe configuração de nfse para empresa, envia para o update
        // @TODO dá para refatorar o create e update ConfigNfse somente em setConfigNFSe e trata o upsert em um método
        if ($empresa->configuracao_nfse) {
            $modelConfigNfse = new EmpresaNFSConfig($nfseConfig);
            return $this->updateConfigNFSe($empresa, $modelConfigNfse, $certificado);
        }

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
     * Método realizado para consultar o status atual do cancelamento, que ocorre de forma assincrona
     *
     * Este método deve ser executado por processamento em batch de linha de comando
     * ou filas
     *
     * @param Empresa $empresa
     * @return void
     */
    public function atualizarStatusNFseEmCancelamentos(Empresa $empresa)
    {
        $nfses = NFSe::where('status', SpedStatus::PROCESSO_CANCELAMENTO)
            ->whereRelation('venda', 'empresa_id', $empresa->id)
            ->get();

        $spedService = new SpedService(SpedService::DOCTYPE_NFSE, $empresa->cidade->name);

        $nfses->each(function ($doc) use ($empresa, $spedService){
            try {
                $nfseDriver = $spedService->nfseDriver($doc);

                $docDriver = $nfseDriver->consultarStatusCancelamento();

                if($docDriver->code == 200){
                    $doc->status = SpedStatus::CANCELADO;
                    $doc->status_historico = (new NFSeService())->addStatusDados($doc, $doc->status, $docDriver->data);
                    $doc->save();
                }
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


    /**
     * Altera a empresa nos serviços Sped para cada tipo de documento e cidade
     *
     * @param array $webhook
     * @return void
     */
    public function checarWebhook(array $webhook)
    {
        Log::info("CHEGOU AQUI CARAI");
        //Log::info($webhook);
        Log::info($webhook['edz_cli_email']);

        $fields = [
            'edz_fat_cod' => $webhook['edz_fat_cod'],
            'edz_cnt_cod' => $webhook['edz_cnt_cod'],
            'edz_cli_cod' => $webhook['edz_cli_cod'],
            'edz_cli_taxnumber' => $webhook['edz_cli_taxnumber'],
            'edz_cli_rsocial' => $webhook['edz_cli_rsocial'],
            'edz_cli_email' => $webhook['edz_cli_email'],
            'edz_fat_dtcadastro' => $webhook['edz_fat_dtcadastro'],
            'edz_cli_cel' => $webhook['edz_cli_cel'],
            'edz_gtr_dist' => $webhook['edz_gtr_dist'],
            'edz_fat_status' => $webhook['edz_fat_status'],
            'edz_cli_apikey' => $webhook['edz_cli_apikey'],
            'edz_valorpago' => $webhook['edz_valorpago'],
            'edz_gtr_param1' => $webhook['edz_gtr_param1'],
            'edz_gtr_param2' => $webhook['edz_gtr_param2'],
            'edz_gtr_param3' => $webhook['edz_gtr_param3'],
            'edz_gtr_param4' => $webhook['edz_gtr_param4'],
        ];

        $stringSid = "";
        //ordenando os campos para poder gerar o sid
        ksort($fields);

        //concatenando os valores em um string para geração do sid
        foreach ($fields as $key => $value) {
            $stringSid .= $value;
        }


        //caso queira usar o nsid faça assim
        $nsid = sha1($webhook['edz_fat_cod'] . $webhook['edz_cnt_cod'] . $webhook['edz_cli_cod']);

        if($nsid != $webhook['nsid']){
            throw new \Exception("NSID inválido");
        }
        //agora voce ja tem todos os dados enviados pela eduzz na entrega customizada

        //voce pode vailidar a requisição com o $webhook['sid'] ou $webhook['nsid'] que é enviado pela eduzz, é só comparar com o $sid ou $nsid feito por voce.

        //depois de validar pode entregar o conteúdo

        $empresa = Empresa::where('documento', $webhook['edz_cli_taxnumber'])->first();

        if($empresa != null){
            //empresa existe, precisa cadastrar

        }else{
            //empresa não existe, precisa cadastrar

        }



    }
}
