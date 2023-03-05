<?php

namespace App\Http\Requests\Api;

use App\Models\TipoLogradouro;
use App\Services\Sped\SpedRegimesTributarios;
use App\Services\Sped\SpedRegimesTributariosEspeciais;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmpresaRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome'              => ['required'],
            'documento'         => ['required', 'cpf_cnpj'],
            'tipo_logradouro'   => ['required', Rule::in(TipoLogradouro::tipos)],
            'logradouro'        => ['required'],
            'numero'            => ['required'],
            'bairro'            => ['required'],
            'cep'               => ['required'],
            'city_id'           => ['required', 'int'],
            'telefone_num'      => ['required'],
            'telefone_ddd'      => ['required', 'ddd'],
            'email'             => ['required', 'email'],
        ];
    }

    /**
     * Descrição do payload que o scribe usará na doc
     * @return array[]
     */
    public function bodyParameters()
    {
        return [
            'nome'              => [
                'description'   => 'Nome da empresa',
                'example'       => 'Fábrica de Molas Molejo'
            ],
            'documento'         => [
                'description'   => 'CPF ou CNPJ, sem pontos ou traços',
                'example'       => '95698578512'
            ],
            'tipo_logradouro'   => [
                'description'   => 'Tipo de logradouro, verificar os tipos no endpoint Tipos de Logradouro',
                'example'       => 'Rua'
            ],
            'logradouro'        => [
                'description'   => 'Endereço',
                'example'       => 'Joaquim Barbosa'
            ],
            'numero'            => [
                'description'   => 'Número do imóvel',
                'example'       => 350
            ],
            'bairro'            => [
                'description'   => 'Bairro do endereço',
                'example'       => 'Centro'
            ],
            'cep'               => [
                'description'   => 'CEP - somente números',
                'example'       => '840665000'
            ],
            'city_id'           => [
                'description'   => 'Id da cidade, a lista de cidades está disponível no endpoint de cidades em Tabelas auxiliares',
                'example'       => '1565'
            ],
            'telefone_num'      => [
                'description'   => 'Número do telefone, sem o DDD',
                'example'       => '998556655'
            ],
            'telefone_ddd'      => [
                'description'   => 'DDD do telefone, somente números',
                'example'       => '41'
            ],
            'email'             => [
                'description'   => 'Endereço de email, corretamente formatado',
                'example'       => 'financeiro@molasmolejo.com.br'
            ],
        ];
    }
}
