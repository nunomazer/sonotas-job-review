<?php

namespace App\Services\Sped\Drivers\Plugnotas;

use App\Models\Empresa;
use App\Models\NFSe;
use App\Services\Sped\ISpedNFSe;
use App\Services\Sped\MetadadosCIdade;
use App\Services\Sped\SpedApiReturn;
use App\Services\Sped\SpedNFSe;
use Illuminate\Support\Facades\Log;

class PlugnotasNFSe extends SpedNFSe implements ISpedNFSe
{
    use PlugnotasTrait;

    protected function toArrayServicos()
    {
        $servicos = [];

        foreach ($this->nfse->itens_servico as $item) {
            $servicos[] = [
                //"idIntegracao" => (string)$item->servico->id, -> Só usa quando cadastramos na API plugnotas, é o id desse cadastro e não de nossa tabela de serviços
                "codigo" => $item->servico->tipo_servico_codigo,
                //"codigoTributacao": "14.10",
                "discriminacao" => $item->servico->nome . "|" . $item->servico->descricao,
                //"cnae": "7490104",
                "iss"=> [
                    //"tipoTributacao": 7,
                    //"exigibilidade": 1,
                    "retido" => $item->servico->iss_retido_fonte,
                    "aliquota" => (float)$item->servico->iss,
                ],
                "valor" => [
                    "servico" => (float)$item->valor,
                    "quantidade" => (int)$item->qtde,
                    //"descontoCondicionado" => $item->desconto,
                    "descontoIncondicionado" => (float)$item->desconto,
                ],
            ];
        }

        return $servicos;
    }

    public function toArray() : array
    {
        $nfse = $this->nfse;
        return [
            "idIntegracao" => (string)$nfse->id,
            "prestador" => [
                "cpfCnpj" => $nfse->venda->empresa->documento,
            ],
            "tomador" => [
                "cpfCnpj" => $nfse->venda->cliente->documento,
                "razaoSocial" => $nfse->venda->cliente->nome,
                "inscricaoMunicipal" => $nfse->venda->cliente->inscricao_estadual,
                "email" => $nfse->venda->cliente->email,
                "endereco" => [
                    //"descricaoCidade": "Maringa",
                    "cep" => $nfse->venda->cliente->cep,
                    "tipoLogradouro" => $nfse->venda->cliente->tipo_logradouro,
                    "logradouro" => $nfse->venda->cliente->logradouro,
                    //"tipoBairro": "Centro",
                    "codigoCidade" => (string)$nfse->venda->cliente->cidade->ibge_id,
                    "complemento" => $nfse->venda->cliente->complemento,
                    "estado" => $nfse->venda->cliente->cidade->estado->acronym,
                    "numero" => $nfse->venda->cliente->numero,
                    "bairro" => $nfse->venda->cliente->bairro,
                ],
            ],
            "rps" => [
                "competencia" => now()->format('Y-m-d'),
                "dataEmissao" => now()->format('Y-m-d H:i:s'),
                "serie"       => '1',
                "numero"      => (string)$nfse->id,
            ],
            "informacoesComplementares" => $nfse->info_adicional,
            "servico" => $this->toArrayServicos(),
        ];
    }

    public function emitir() : SpedApiReturn
    {
        try {
            $result = $this->httpClient()->request('POST', 'nfse', [
                'json' => [
                    $this->toArray()
                ],
            ]);

            // @TODO melhorar a responsabilidade, colocar isso de maneira que o service de nfse se responsabilize
            // por atualizar o campo do registro
            $this->nfse->producao = $this->nfse->venda->empresa->configuracao_nfse->producao;

            return $this->toApiReturn($result);

        } catch (\Exception $exception) {
            Log::error('Erro ao chamar Plugnotas Emitir NFSe');
            Log::error($this->toArray());
            Log::error($exception->getResponse()->getBody()->getContents());
            return $this->toApiReturn($exception);
        }
    }

    public function consultar()
    {
        $result = $this->httpClient()->request('GET', 'nfse/'.$this->nfse->driver_id);

        $docDriver = json_decode($result->getBody()->getContents(), true);

        // TODO definir um padrão para os drivers na consulta sempre retornarem igual para o service
        return $docDriver;
    }

    public function downloadPdf() // TODO definir o tipo de retorno
    {
        $result = $this->httpClient()->request('GET', 'nfse/pdf/'.$this->nfse->driver_id);

        $docDriver = (string)$result->getBody();

        return $docDriver;
    }

    public function downloadXml()
    {
        $result = $this->httpClient()->request('GET', 'nfse/xml/'.$this->nfse->driver_id);

        $docDriver = (string)$result->getBody();

        return $docDriver;
    }

    public function cancelar() : SpedApiReturn
    {
        try {
            $result = $this->httpClient()->request('POST', 'nfse/cancelar/' . $this->nfse->driver_id, [
                'json' => [
                    'codigo' => $this->nfse->cancelamento_codigo,
                    'motivo' => $this->nfse->cancelamento_motivo,
                ],
            ]);

            return $this->toApiReturn($result);

        } catch (\Exception $exception) {
            Log::error('Erro ao chamar Plugnotas Cancelar NFSe');
            Log::error($exception);
            return $this->toApiReturn($exception);
        }
    }

    public function consultarStatusCancelamento() : SpedApiReturn
    {
        try {
            $result = $this->httpClient()->request('GET', 'nfse/cancelar/status/' . $this->nfse->driver_id);

            return $this->toApiReturn($result);

        } catch (\Exception $exception) {
            Log::error('Erro ao chamar Plugnotas Consultar status cancelamento NFSe');
            Log::error($exception);
            return $this->toApiReturn($exception);
        }
    }
}
