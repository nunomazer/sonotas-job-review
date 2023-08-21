<?php

namespace App\Http\Requests\Api;

use App\Models\TipoLogradouro;
use App\Services\Sped\SpedRegimesTributarios;
use App\Services\Sped\SpedRegimesTributariosEspeciais;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ConfiguracaoNfseEmpresaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // como somente o afiliado executa ações pela api, o usuário é controlado então não precisamos
        // neste momento realizar validações de permissão, está autenticado na api tem a permissão
        return true;
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'iss_retido_fonte' => filter_var($this->request->get('iss_retido_fonte'), FILTER_VALIDATE_BOOLEAN),
            'enviar_nota_email_cliente' => filter_var($this->request->get('enviar_nota_email_cliente'), FILTER_VALIDATE_BOOLEAN),
            'producao' => filter_var($this->request->get('producao'), FILTER_VALIDATE_BOOLEAN),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'empresa_id'            => ['required', 'int', 'exists:empresas,id'],
            'cnae_codigo'           => ['required', 'exists:cnaes,codigo'],
            'natureza_operacao'     => ['string'],
            'tipo_servico_codigo'   => ['required', 'exists:tipo_servicos,codigo'],
            'cofins'                => ['required', 'numeric'],
            'csll'                  => ['required', 'numeric'],
            'inss'                  => ['required', 'numeric'],
            'ir'                    => ['required', 'numeric'],
            'pis'                   => ['required', 'numeric'],
            'iss'                   => ['required', 'numeric'],
            'tributos'              => ['required', 'numeric'],
            'iss_retido_fonte'      => ['bool', 'required'],
            'enviar_nota_email_cliente'=> ['bool', 'required'],
            'municipio_servico_codigo' => [],
            'municipio_servico_descricao' => [],
            'ultimo_rps_liberado'   => [],
            'prefeitura_usuario'    => [],
            'prefeitura_senha'      => [],
        ];
    }

    /**
     * Descrição do payload que o scribe usará na doc
     * @return array[]
     */
    public function bodyParameters()
    {
        return [
            'empresa_id'        => [
                'description'   => 'Id da empresa para o qual a configiração deve ser associada',
                'example'       => 2
            ],
            'cnae_codigo'       => [
                'description'   => 'Código do CNAE',
                'example'       => '10.58'
            ],
            'natureza_operacao' => [
                'description'   => 'Código da Natureza da operação padrão',
                'example'       => '33.44'
            ],
            'tipo_servico_codigo'=> [
                'description'   => 'Código do tipo de serviço',
                'example'       => '01.02',
            ],
            'cofins'            => [
                'description'   => 'Percentual de Cofins do serviço, enviar com 2 decimais, ex: 5.00',
                'example'       => 'No-example',
            ],
            'csll'            => [
                'description'   => 'Percentual de CSLL do serviço, enviar com 2 decimais, ex: 5.00',
                'example'       => 'No-example',
            ],
            'inss'            => [
                'description'   => 'Percentual de INSS do serviço, enviar com 2 decimais, ex: 5.00',
                'example'       => 'No-example',
            ],
            'ir'                => [
                'description'   => 'Percentual de IR do serviço, enviar com 2 decimais, ex: 5.00',
                'example'       => 'No-example',
            ],
            'pis'               => [
                'description'   => 'Percentual de PIS do serviço, enviar com 2 decimais, ex: 5.00',
                'example'       => 'No-example',
            ],
            'iss'               => [
                'description'   => 'Percentual de ISS do serviço, enviar com 2 decimais, ex: 5.00',
                'example'       => 'No-example',
            ],
            'tributos'          => [
                'description'   => 'Percentual tributos, ex: 6.00',
                'example'       => 'No-example',
            ],
            'iss_retido_fonte'  => [
                'description'   => 'Define se o ISS é retido na fonte para o serviço, default false',
                'example'       => false,
            ],
            'enviar_nota_email_cliente'
                                => [
                'description'   => 'Define se a Nota deve ser enviada por email ao cliente, default false',
                'example'       => false,
            ],
            'municipio_servico_codigo'
                                => [
                'description'   => 'Código padrão do serviço no município',
                'example'       => '3939.3',
            ],
            'municipio_servico_descricao'
                                => [
                'description'   => 'Descrição do serviço no município',
                'example'       => 'Serviços de Consultoria',
            ],
            'ultimo_rps_liberado'
                                => [
                'description'   => 'Número do último RPS liberado no município, será controlado sequencialmente na emissão pelo Só Notas',
                'example'       => '393',
            ],
            'prefeitura_usuario'
                                => [
                'description'   => 'Caso a prefeitura da empresa não possua sistema de emissão por certificado digital, necessário configurar usuário e senha do portal',
                'example'       => 'nfe@minhaempresa.com',
            ],
            'prefeitura_senha'
                                => [
                'description'   => 'Caso a prefeitura da empresa não possua sistema de emissão por certificado digital, necessário configurar usuário e senha do portal',
                'example'       => 'minhasenhasecreta',
            ],
        ];
    }
}
