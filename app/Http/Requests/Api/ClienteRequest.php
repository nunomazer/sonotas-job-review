<?php

namespace App\Http\Requests\Api;

use App\Models\TipoLogradouro;
use App\Services\Sped\SpedRegimesTributarios;
use App\Services\Sped\SpedRegimesTributariosEspeciais;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClienteRequest extends FormRequest
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
            'orgao_publico' => filter_var($this->request->get('orgao_publico'), FILTER_VALIDATE_BOOLEAN),
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
            'empresa_id'        => ['required', 'int', 'exists:empresas,id'],
            'nome'              => ['required'],
            'documento'         => ['required', 'cpf_cnpj'],
            'inscricao_estadual'=> [],
            'inscricao_municipal'=> [],
            'inscricao_suframa' => [],
            'tipo_logradouro'   => ['required', Rule::in(TipoLogradouro::tipos)],
            'logradouro'        => ['required'],
            'numero'            => ['required'],
            'bairro'            => ['required'],
            'cep'               => ['required'],
            'city_id'           => ['required'],
            'telefone_num'      => ['required'],
            'telefone_ddd'      => ['required', 'ddd'],
            'email'             => ['required', 'email'],
            'orgao_publico'     => ['bool'],
            'regime_tributario' => ['required', 'int', Rule::in(SpedRegimesTributarios::toArrayValores())],
            'regime_tributario_especial'
            => ['required', 'int', Rule::in(SpedRegimesTributariosEspeciais::toArrayValores())],
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
                'description'   => 'Id da empresa para o qual o cliente deve ser associado',
                'example'       => 2
            ],
            'nome'              => [
                'description'   => 'Nome do cliente',
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
            'orgao_publico'     => [
                'description'   => 'Marca se o cliente é órgão público (true) ou não (false - default)',
                'example'       => false
            ],
            'regime_tributario' => [
                'description'   => 'Código do regime tributário da empresa, lista disponível no endpoint Regimes Tributários',
                'example'       => 1,
            ],
            'regime_tributario_especial'
            => [
                'description'   => 'Código do regime tributário especial da empresa, lista disponível no endpoint Regimes Tributários Especiais',
                'example'       => 0,
            ],
            'inscricao_estadual'=> [
                'description'   => 'Código da inscrição estadual',
                'example'       => '34934872',
            ],
            'inscricao_municipal'=> [
                'description'   => 'Código da inscrição municipal',
                'example'       => '3932222',
            ],
            'inscricao_suframa'=> [
                'description'   => 'Código da inscrição suframa',
                'example'       => '929292',
            ],
        ];
    }
}
