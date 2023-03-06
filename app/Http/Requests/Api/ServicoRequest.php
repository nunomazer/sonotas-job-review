<?php

namespace App\Http\Requests\Api;

use App\Models\TipoLogradouro;
use App\Services\Sped\SpedRegimesTributarios;
use App\Services\Sped\SpedRegimesTributariosEspeciais;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServicoRequest extends FormRequest
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
            'ativo' => filter_var($this->request->get('ativo'), FILTER_VALIDATE_BOOLEAN),
            'iss_retido_fonte' => filter_var($this->request->get('iss_retido_fonte'), FILTER_VALIDATE_BOOLEAN),
            'enviar_nota_email_cliente' => filter_var($this->request->get('enviar_nota_email_cliente'), FILTER_VALIDATE_BOOLEAN),
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
            'nome'                  => ['required'],
            'descricao'             => [],
            'obs'                   => [],
            'valor'                 => ['required', 'numeric'],
            'tipo_servico_codigo'   => ['required', 'exists:tipo_servicos,codigo'],
            'cofins'                => ['numeric'],
            'csll'                  => ['numeric'],
            'inss'                  => ['numeric'],
            'ir'                    => ['numeric'],
            'pis'                   => ['numeric'],
            'iss'                   => ['numeric'],
            'iss_retido_fonte'      => ['bool', 'required'],
            'enviar_nota_email_cliente'=> ['bool', 'required'],
            'municipio_servico_codigo' => [],
            'municipio_servico_descricao' => [],
            'ultimo_rps_liberado'   => [],
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
                'description'   => 'Id da empresa para o qual o serviço deve ser associado',
                'example'       => 2
            ],
            'nome'              => [
                'description'   => 'Nome do serviço',
                'example'       => 'Consultoria de Marketing Digital'
            ],
            'descricao'         => [
                'description'   => 'Descrição detalhada do serviço, até 4000 caracteres',
                'example'       => 'Lorem ipsum'
            ],
            'descricao'         => [
                'description'   => 'Outras observações do serviço, até 4000 caracteres',
                'example'       => 'Lorem ipsum'
            ],
            'tipo_servico_codigo'=> [
                'description'   => 'Código do tipo de serviço',
                'example'       => '01.02',
            ],
            'valor'             => [
                'description'   => 'Valor base do serviço, obrigatoriamente enviar 2 decimais, ex: 15.00',
                'example'       => 'No-example',
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
                'description'   => 'Código do serviço no município',
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
        ];
    }
}
