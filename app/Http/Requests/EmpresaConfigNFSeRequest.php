<?php

namespace App\Http\Requests;

use App\Models\TipoLogradouro;
use App\Services\Sped\SpedRegimesTributarios;
use App\Services\Sped\SpedRegimesTributariosEspeciais;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmpresaConfigNFSeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (strtolower($this->method()) == 'post') return true;

        return auth()->user()->can('updateConfigNFSe', $this->empresa);
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'iss_retido_fonte' => $this->get('iss_retido_fonte', 0),
            'enviar_nota_email_cliente' => $this->get('enviar_nota_email_cliente', 0),
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
        ];
    }
}
