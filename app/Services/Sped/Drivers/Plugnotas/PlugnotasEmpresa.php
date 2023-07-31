<?php

namespace App\Services\Sped\Drivers\Plugnotas;

use App\Models\Certificado;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\NFSe;
use App\Services\Sped\SpedApiReturn;
use App\Services\Sped\SpedEmpresa;
use App\Services\Sped\ISpedEmpresa;
use App\Services\Sped\SpedRegimesTributarios;
use App\Services\Sped\SpedStatus;
use GuzzleHttp\Psr7\Utils;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
            'simplesNacional' => ($empresa->regime_tributario == SpedRegimesTributarios::SIMPLES_NACIONAL),
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
                    //'rps' => [], // TODO VALIDAR AQUI A NECESSIDADE DE MAIS CADDASTROS EM BANCO POR EMPRESA
                    'prefeitura' => [
                        'login' => null,
                        'senha' => null,
                    ] // TODO VALIDAR AQUI A NECESSIDADE DE DADOS NO CADASTRO
                ]
            ],
            'nfe' => [
                'ativo'=> false, // Primeira versão sem nfe
                'tipoContrato'=> 0,
//                'config' => []
            ],
            'nfce' => [
                'ativo'=> false, // Primeira versão sem nfe
                'tipoContrato'=> 0,
//                'config' => []
            ],
            'mdfe' => [
                'ativo'=> false, // Primeira versão sem nfe
                'tipoContrato'=> 0,
//                'config' => []
            ],
        ];
    }

    public function cadastrar(): SpedApiReturn
    {
        try {
            $empresa = $this->toArray();

            // somente pode gravar empresa com certificado
            if ($empresa['certificado'] == null) {
                return false;
            }

            $result = $this->httpClient()->request('POST', 'empresa', [
                'json' => $empresa
            ]);

            return $this->toApiReturn($result);

        } catch (\Exception $exception) {
            Log::error('Erro ao chamar Plugnotas Cadastrar Empresa');
            Log::error(json_encode($empresa, JSON_PRETTY_PRINT));
            Log::error($exception);
            return $this->toApiReturn($exception);
        }
    }

    public function alterar(): SpedApiReturn
    {
        try {
            $result = $this->httpClient()->request('GET', 'empresa/'. $this->empresa->documento);
        } catch (\Exception $exception) {
            if ($exception->getCode() == 404) {
                return $this->cadastrar();
            }

            Log::error('Erro ao chamar Plugnotas Consultar Empresa na rotina de Alterar Empresa');
            Log::error($exception);
            return $this->toApiReturn($exception);
        }

        try {
            $result = $this->httpClient()->request('PATCH', 'empresa/'.$this->empresa->documento, [
                'json' => $this->toArray()
            ]);

            return $this->toApiReturn($result);

        } catch (\Exception $exception) {
            Log::error('Erro ao chamar Plugnotas Alterar Empresa');
            Log::error('Empresa', $this->toArray());
            Log::error($exception);
            return $this->toApiReturn($exception);
        }
    }

    public function atualizarStatusDocsProcessamento()
    {
        $driverName = (new PlugnotasDriver())->nome();
        $nfses = NFSe::where('status', SpedStatus::PROCESSAMENTO)
            ->where('driver', $driverName)
            ->get();

        $nfses->each(function ($doc) {
            try {
                $result = $this->httpClient()->request('GET', 'nfse/'.$doc->driver_id);

                $docDriver = json_decode($result->getBody()->getContents(), true);

                return $this->toApiReturn($result);

            } catch (\Exception $exception) {
                Log::error('Erro ao chamar Plugnotas Alterar Empresa');
                Log::error($exception);
                return $this->toApiReturn($exception);
            }
        });
    }

    public function cadastrarCertificado(Certificado $certificado): SpedApiReturn
    {
        Log::debug(Storage::path($certificado->file));
        try {
            $payload = [
                [
                    'name' => 'senha',
                    'contents' => $certificado->password,
                ],
                [
                    'name' => 'arquivo',
                    'contents' => Utils::tryFopen(Storage::path($certificado->file), 'r'),
                ],
            ];

            $result = $this->httpClient()->request('POST', 'certificado', [
                'multipart' => $payload
            ]);

            $data = json_decode($result->getBody()->getContents())->data;
            $certificado->sped_id = $data->id;
            $certificado->save();

            // atualiza certificado na empresa plugnotas
            $result = $this->httpClient()->request('PATCH', 'empresa/'.$this->empresa->documento, [
                'json' => [
                    'certificado' => $certificado->sped_id,
                ]
            ]);

            return $this->toApiReturn($result);

        } catch (\Exception $exception) {
            Log::error('Erro ao chamar Plugnotas Cadastrar Certificado');
            Log::error($exception);
            return $this->toApiReturn($exception);
        }
    }

    public function metadadosCidade(): SpedApiReturn
    {
        try {
            $result = $this->httpClient()->request('GET', 'nfse/cidades/' . $this->empresa->cidade->ibge_id);

            $data = json_decode($result->getBody()->getContents());

            $result = $this->toApiReturn($result);
            $result->data = (array)$data;
            return $result;
        } catch (\Exception $exception) {
            Log::error('Erro ao chamar Plugnotas Consultar status cancelamento NFSe');
            Log::error($exception);
            return $this->toApiReturn($exception);
        }
    }
}
