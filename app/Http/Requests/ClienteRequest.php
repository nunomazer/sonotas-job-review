<?php

namespace App\Http\Requests;

use App\Models\Empresa;
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
        $empresa = Empresa::find($this->empresa_id ?? 0);

        if ($empresa == null) return false;

        return auth()->user()->can('update', $empresa);
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
            'empresa_id'        => ['required'],
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
}
