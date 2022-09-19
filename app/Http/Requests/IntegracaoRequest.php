<?php

namespace App\Http\Requests;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IntegracaoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // TODO refatorar para policy
        if (auth()->user()->hasRole(Role::SYSADMIN)) return true;
        return in_array($this->empresa->id, auth()->user()->empresas->pluck('id')->toArray());
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'ativo' => filter_var($this->request->get('ativo'), FILTER_VALIDATE_BOOLEAN),
            'transmissao_automatica' => filter_var($this->request->get('transmissao_automatica'), FILTER_VALIDATE_BOOLEAN),
            'transmissao_apenas_dias_uteis' => filter_var($this->request->get('transmissao_apenas_dias_uteis'), FILTER_VALIDATE_BOOLEAN),
        ]);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $fieldsRules = [];
        foreach ($this->request->get('fields') as $key => $value) {
            $fieldsRules['fields'][$key] = ['required'];
        }

        return array_merge($fieldsRules, [
            'driver'            => ['required'],
            'name'              => ['required'],
            'tipo_documento'    => ['required'],
            'data_inicio'       => ['required'],
        ]);
    }
}
