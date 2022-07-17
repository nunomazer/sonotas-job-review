<?php

namespace App\Services\Sped\Drivers\Plugnotas;

use App\Models\Cliente;
use App\Models\Empresa;
use App\Services\Sped\SpedEmpresa;
use App\Services\Sped\ISpedEmpresa;
use App\Services\Sped\RegimesTributarios;
use Illuminate\Support\Facades\Log;

class PlugnotasEmpresa extends SpedEmpresa implements ISpedEmpresa
{
    use PlugnotasTrait;

    public function toArray() : array
    {
        $empresa = $this->empresa;

        $certificado = '5ecc441a4ea3b318cec7f999';
        if (config('sped.drivers.plugnotas.producao')) {
            $certificado = $empresa->certificado ? $empresa->certificado->sped_id : null;
        }

        return [
            'cpfCnpj' => $empresa->documento,
            'inscricaoMunicipal' => $empresa->inscricao_municipal,
            'inscricaoEstadual' => $empresa->inscricao_estadual,
            'razaoSocial' => $empresa->nome,
            'nomeFantasia' => $empresa->alias,
            'certificado' => $certificado,
            'simplesNacional' => ($empresa->regime_tributario == RegimesTributarios::SIMPLES_NACIONAL),
            'regimeTributario' => $empresa->regime_tributario,
            //"incentivoFiscal": true,
            //"incentivadorCultural": true,
            'regimeTributarioEspecial' => $empresa->regime_tributario_especial,
            'endereco' => [
                'bairro'=> $empresa->bairro,
                'cep' => $empresa->cep,
                'codigoCidade' => $empresa->cidade->ibge_id,
                'estado' => $empresa->cidade->estado->acronym,
                'logradouro' => $empresa->logradouro,
                'numero' => $empresa->numero,
                'tipoLogradouro' => $empresa->tipo_logradouro,
                //"codigoPais": "1058",
                'complemento' => $empresa->complemento,
                //"descricaoCidade": "Maringá",
                //"descricaoPais": "Brasil",
                //"tipoBairro": "Zona"
            ],
            'telefone' => [
                'numero' => $empresa->telefone_num,
                'ddd' => $empresa->telefone_ddd,
            ],
            'email' => $empresa->email,
            'nfse' => [
                'ativo' => true, // empresas são os nossos clientes que emitem NF, então cadastramos ativos para envio de nfse
                'tipoContrato' => 0, // pode pegar do config, mas por hora forçamos 0 bilhetagem para não correr o risco de sobrepor clientes de nossas empresas que podem ser nossos clientes e se ativar com 1 cobra por cnpj e não emissão
                'config' => [
                    'producao' => config('sped.drivers.plugnotas.producao'),
                    'rps' => [], // TODO VALIDAR AQUI A NECESSIDADE DE MAIS CADDASTROS EM BANCO POR EMPRESA
                    'prefeitura' => [] // TODO VALIDAR AQUI A NECESSIDADE DE DADOS NO CADASTRO
                ]
            ],
            'nfe' => [
                'ativo'=> false, // Primeira versão sem nfe
                'tipoContrato'=> 0,
                'config' => []
            ],
            'nfce' => [
                'ativo'=> false, // Primeira versão sem nfe
                'tipoContrato'=> 0,
                'config' => []
            ]
        ];
    }

    public function cadastrar(): string
    {
        try {
            $result = $this->httpClient()->request('POST', 'empresa', [
                'json' => $this->toArray()
            ]);

            return $this->toApiReturn($result);

        } catch (\Exception $exception) {
            Log::error('Erro ao chamar Plugnotas Cadastrar Empresa');
            Log::error($exception);
            return $this->toApiReturn($exception);
        }
    }

    public function alterar(): string
    {
        try {
            $result = $this->httpClient()->request('PATCH', 'empresa/'.$this->empresa->documento, [
                'json' => $this->toArray()
            ]);

            return $this->toApiReturn($result);

        } catch (\Exception $exception) {
            Log::error('Erro ao chamar Plugnotas Alterar Empresa');
            Log::error($exception);
            return $this->toApiReturn($exception);
        }
    }

}
