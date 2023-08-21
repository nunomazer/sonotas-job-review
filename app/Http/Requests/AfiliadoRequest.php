<?php

namespace App\Http\Requests;

use App\Models\TipoLogradouro;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AfiliadoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->routeIs('afiliados.store')) { return true; }

        return auth()->user()->can('update', $this->afiliado);
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
            //'user_id'           => ['required'],
            'nome'              => ['required'],
            'documento'         => ['required', 'cpf_cnpj'],
            'tipo_logradouro'   => ['required', Rule::in(TipoLogradouro::tipos)],
            'logradouro'        => ['required'],
            'numero'            => ['required'],
            'bairro'            => ['required'],
            'cep'               => ['required'],
            'city_id'           => ['required'],
            'telefone_num'      => ['required'],
            'telefone_ddd'      => ['required', 'ddd'],
            'email'             => ['required', 'email'],
        ];
    }

    public function withValidator($validator)
    {
        if ($this->routeIs('afiliados.store')) { return; }

        if (!$validator->fails()) {
            $validator->after(function ($validator) {
                if ($this->user_id != $this->afiliado->user_id) {
                    $validator->errors()->add(
                        'Usuário do Afiliado',
                        'O usuário do afiliado não pode ser alterado desta maneira!'
                    );
                }
            });
        }
    }
}
