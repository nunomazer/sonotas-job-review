<?php

namespace App\Http\Requests;

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
        if ($this->routeIs('empresas.store')) return true;

        return auth()->user()->can('update', $this->empresa);
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'ativo' => filter_var($this->request->get('ativo'), FILTER_VALIDATE_BOOLEAN),
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
            'owner_user_id'     => ['required'],
            'nome'              => ['required'],
            'documento'         => ['required', 'cpf_cnpj'],
            'tipo_logradouro'   => ['required', Rule::in(TipoLogradouro::tipos)],
            'logradouro'        => ['required'],
            'numero'            => ['required'],
            'bairro'            => ['required'],
            'logo'              => [],
            'cep'               => ['required'],
            'city_id'           => ['required'],
            'telefone_num'      => ['required'],
            'telefone_ddd'      => ['required', 'ddd'],
            'email'             => ['required', 'email'],
            'regime_tributario' => ['required', Rule::in(SpedRegimesTributarios::toArrayValores())],
            'regime_tributario_especial'
                                => ['required', Rule::in(SpedRegimesTributariosEspeciais::toArrayValores())],
        ];
    }

    public function withValidator($validator)
    {
        if ($this->routeIs('empresas.store')) return;

        if (!$validator->fails()) {
            $validator->after(function ($validator) {
                if ($this->owner_user_id != $this->empresa->owner_user_id) {
                    $validator->errors()->add('Proprietário da Empresa', 'O proprietário da empresa não pode ser alterado desta maneira!');
                }
            });
        }
    }
}
