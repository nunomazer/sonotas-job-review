<?php

namespace App\Services\Sped\Drivers\Plugnotas;

use App\Models\NFSe;
use App\Services\Sped\ISpedNFSe;
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
                "idIntegracao" => $item->servico->id,
                "codigo" => $item->servico->tipo_servico_codigo,
                //"codigoTributacao": "14.10",
                "discriminacao" => $item->servico->nome . "|" . $item->servico->descricao,
                //"cnae": "7490104",
                "iss"=> [
                    //"tipoTributacao": 7,
                    //"exigibilidade": 1,
                    "aliquota" => $item->servico->iss,
                ],
                "valor" => [
                    "servico" => $item->valor,
                    "quantidade" => $item->quantidade,
                    //"descontoCondicionado": 0,
                    //"descontoIncondicionado": 0
                ],
            ];
        }

        return $servicos;
    }

    public function toArray() : array
    {
        $nfse = $this->nfse;
        return [
            "idIntegracao" => $nfse->id,
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
                    "codigoCidade" => $nfse->venda->cliente->cidade->ibge_id,
                    "complemento" => $nfse->venda->cliente->complemento,
                    "estado" => $nfse->venda->cliente->cidade->estado->acronym,
                    "numero" => $nfse->venda->cliente->numero,
                    "bairro" => $nfse->venda->cliente->bairro,
                ],
            ],
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

            return $this->toApiReturn($result);

        } catch (\Exception $exception) {
            Log::error('Erro ao chamar Plugnotas Emmitir NFSe');
            Log::error($exception);
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
}
