<?php

namespace App\Services;

use App\Events\NFSeCriadaEvent;
use App\Events\NFSeSolicitadoCancelamentoEvent;
use App\Listeners\EnviaFilesNFSe;
use App\Mail\NfPdfXmlClienteMail;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\NFSe;
use App\Models\NFSeItemServico;
use App\Models\PlanFeature;
use App\Models\Servico;
use App\Models\ServicoIntegracao;
use App\Notifications\ErroAoCancelarNFSe;
use App\Notifications\ErroAoGerarEmitirNF;
use App\Services\Sped\SpedService;
use App\Services\Sped\SpedStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NFSeService
{
    /**
     * Envia um objeto de memória de NFSe model, ou um array com os dados de criação de uma NFSe,
     * e um array com objetos (ou array de dados) de itens de serviço das NFSe, para que o service
     * grave no banco de dados e dispare os eventos de emissão de notas na api e demais fluxos necessários
     *
     * @param array $nfse
     * @param array<array|NFSeItemServico> $itensServico
     * @return NFSe|null
     */
    public function create(array $nfse, array $itensServico) : ? NFSe
    {
        try {
            DB::beginTransaction();

                $nfse['status'] = SpedStatus::PENDENTE;
                $nfse['status_historico'] = $this->addStatusDados(null, SpedStatus::PENDENTE, ['message' => 'Registro criado no banco de dados']);

                $nfse = NFSe::create($nfse);

                $nfse->itens_servico()->saveMany($itensServico);

            DB::commit();

            NFSeCriadaEvent::dispatch($nfse);

            return $nfse;

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Erros ao gravar a NFSe');
            Log::error($exception);

            return null;
        }
    }

    public function emitirSped(NFSe $nfse) : NFSe
    {
        // se o status não é pendente então já foi emitido em algum ponto da aplicação, ou
        // por job ou por comando
        if ($nfse->status != SpedStatus::PENDENTE) return $nfse;

        // se não tiver saldo de bilhetagem mantem o status pendente e atualiza o histórico
        if ($nfse->empresa->assinatura->featureSaldo(PlanFeature::FEATURE_QTDE_NOTAS) == 0) {
            $nfse->status = SpedStatus::PENDENTE;
            $nfse->status_historico = $this->addStatusDados($nfse, SpedStatus::PENDENTE, ['message' => 'Saldo de documentos fiscais insuficiente no período, será emitida na renovação do saldo']);
            $nfse->save();
            $nfse->venda->empresa->owner->notify(new ErroAoGerarEmitirNF($nfse->venda->empresa, $nfse->venda, 'Saldo de documentos fiscais insuficiente no período, será emitida na renovação do saldo, ao emitir a NFSe para venda ' . $nfse->id));
            return $nfse;
        }

        // emite NF
        // TODO: refatorar para qualquer doc fiscal
        $sped = new SpedService(SpedService::DOCTYPE_NFSE, $nfse->venda->empresa->cidade->name);
        try {
            $driverNFSe = $sped->nfseDriver($nfse);
            $result = $driverNFSe->emitir();

            $nfse->driver = $sped->driver()->nome();

            throw_if($result->code > 300, 'Erro no retorno da API Plugnotas: ' . $result->message);

            $nfse->status = SpedStatus::PROCESSAMENTO;
            $nfse->driver_id = $result->objects[0]['idApi'];
            $nfse->status_historico = $this->addStatusDados($nfse, $nfse->status, $result->toArray());
            $nfse->save();
            $nfse->empresa->assinatura->featureSaldoDecrement(PlanFeature::FEATURE_QTDE_NOTAS);

        } catch (\Exception $exception) {
            $nfse->status = SpedStatus::ERRO;
            $nfse->status_historico = $this->addStatusDados($nfse, SpedStatus::ERRO, ['message' => 'Exception: ' . $exception->getMessage()]);
            $nfse->save();
            $nfse->venda->empresa->owner->notify(new ErroAoGerarEmitirNF($nfse->venda->empresa, $nfse->venda, 'Um erro ocorreu ao emitir a NFSe para venda ' . $nfse->id));
            Log::error($exception);
        }

        return $nfse;
    }

    /**
     * Adiciona dados no histórico de status, ATENÇÃO, não salva o registro apenas monta corretamente o valor
     * que deve substituir o campo status_historico
     *
     * @param NFSe $nfse
     * @param string $status Status de acordo com os status permitidos
     * @param array $dados Dados que devem ser inseridos como conteúdo do histórico
     * @return void
     */
    public function addStatusDados(?NFSe $nfse, string $status, array $dados) : array
    {
        $historico = ($nfse) ? $nfse->status_historico : [];
        $historico[$status] = array_merge(['created_at' => now()->format('Y-m-d H:i:s')], $dados);
        return $historico;
    }

    public function sendClientXmlEmail(NFSe $nfse)
    {
        if($nfse->venda->empresa->enviar_nota_email_cliente) {
            Mail::send(new NfPdfXmlClienteMail($nfse->venda));
        }
    }

    /**
     * Método responsável por disparar serviço que realiza cancelamento da NFSe
     *
     * @param NFSe $nfse
     * @return NFSe|null
     */
    public function cancel(NFSe $nfse) : ? NFSe
    {
        try {
            DB::beginTransaction();

                $nfse['status'] = SpedStatus::PROCESSO_CANCELAMENTO;
                $nfse['status_historico'] = $this->addStatusDados(null, SpedStatus::PROCESSO_CANCELAMENTO, ['message' => 'Cancelamento solicitado']);

                $nfse->save();
            DB::commit();

            NFSeSolicitadoCancelamentoEvent::dispatch($nfse);

            return $nfse;

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Erros ao solicitar cancelamento da NFSe');
            Log::error($exception);

            return null;
        }
    }

    /**
     * Método responsável por disparar serviço que realiza cancelamento da NFSe
     *
     * @param NFSe $nfse
     * @return NFSe|null
     */
    public function cancelarSped(NFSe $nfse) : ? NFSe
    {
        $sped = new SpedService(SpedService::DOCTYPE_NFSE, $nfse->venda->empresa->cidade->name);
        try {
            $driverNFSe = $sped->nfseDriver($nfse);
            $result = $driverNFSe->cancelar();

            $nfse->driver = $sped->driver()->nome();

            throw_if($result->code > 200, 'Erro no retorno da API Plugnotas: ' . $result->message);


        } catch (\Exception $exception) {
            $nfse->status = SpedStatus::ERRO;
            $nfse->status_historico = $this->addStatusDados($nfse, SpedStatus::ERRO, ['message' => 'Exception: ' . $exception->getMessage()]);
            $nfse->save();
            $nfse->venda->empresa->owner->notify(new ErroAoCancelarNFSe($nfse->venda->empresa, $sped->driver()->nome(), 'Problemas ao realizar cancelamento de NFSe: para venda ' . $nfse->id));

            Log::error($exception);
        }

        return $nfse;
    }
}
