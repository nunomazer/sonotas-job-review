<?php

namespace App\Services\Sped\Drivers\Plugnotas;

use App\Models\NFSe;
use App\Services\Sped\ISpedNFSe;
use App\Services\Sped\SpedNFSe;

class PlugnotasNFSe extends SpedNFSe implements ISpedNFSe
{
    use PlugnotasTrait;

    protected function toArrayServicos()
    {
        $servicos = [];

        foreach ($this->nfse->itens_servico as $item) {
            $servicos[] = [
                "idIntegracao" => $item->servico->id,
                "codigo" => $item->servico->tipo->codigo,
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
                "cpfCnpj" => $nfse->empresa->documento,
            ],
            "tomador" => [
                "cpfCnpj" => $nfse->cliente->documento,
                "razaoSocial" => $nfse->cliente->nome,
                "inscricaoMunicipal" => $nfse->cliente->inscricao_estadual,
                "email" => $nfse->cliente->email,
                "endereco" => [
                    //"descricaoCidade": "Maringa",
                    "cep" => $nfse->cliente->cep,
                    "tipoLogradouro" => $nfse->cliente->tipo_logradouro,
                    "logradouro" => $nfse->cliente->logradouro,
                    //"tipoBairro": "Centro",
                    "codigoCidade" => $nfse->cliente->cidade->ibge_id,
                    "complemento" => $nfse->cliente->complemento,
                    "estado" => $nfse->cliente->cidade->estado->acronym,
                    "numero" => $nfse->cliente->numero,
                    "bairro" => $nfse->cliente->bairro,
                ],
            ],
            "servico" => $this->toArrayServicos(),
        ];
    }

    public function emitir(NFSe $NFSe)
    {
        try {
            $result = $this->httpClient()->request('POST', 'nfse', [
                'json' => $this->toArray()
            ]);
        } catch (\Exception $exception) {
            dd($exception->getCode());
        }
        dd($result->getBody()->getContents());
    }
}
