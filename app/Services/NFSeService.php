<?php

namespace App\Services;

use App\Events\NFSeCriadaEvent;
use App\Listeners\EnviaFilesNFSe;
use App\Mail\NfPdfXmlClienteMail;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\NFSe;
use App\Models\NFSeItemServico;
use App\Models\Servico;
use App\Models\ServicoIntegracao;
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
        try {
            $sped = new SpedService(SpedService::DOCTYPE_NFSE, $nfse->venda->empresa->cidade->name);
            $driverNFSe = $sped->nfseDriver($nfse);
            $result = $driverNFSe->emitir();

            $nfse->driver = $sped->driver()->nome();

            throw_if($result->code > 300, 'Erro no retorno da API Plugnotas: ' . $result->message);

            $nfse->status = SpedStatus::PROCESSAMENTO;
            $nfse->driver_id = $result->objects[0]['idApi'];
            $nfse->status_historico = $this->addStatusDados($nfse, $nfse->status, $result->toArray());
            $nfse->save();

        } catch (\Exception $exception) {
            $nfse->status = SpedStatus::ERRO;
            $nfse->status_historico = $this->addStatusDados($nfse, SpedStatus::ERRO, ['message' => 'Exception: ' . $exception->getMessage()]);
            $nfse->save();

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

}
