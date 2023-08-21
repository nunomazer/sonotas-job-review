<?php

namespace App\Transformers;

use App\Models\Empresa;
use App\Models\Estado;
use Illuminate\Support\Arr;
use League\Fractal\TransformerAbstract;

class EmpresaTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Empresa $model)
    {
        return Arr::except($model->toArray(), [
            'owner_user_id', 'owner', 'owner_user_id',
            'logo', 'afiliado_id',
        ]);
        return [
            'id' => $model->id,
            'ativo' => $model->ativo,
            'documento' => $model->documento,
            'nome' => $model->nome,
            'alias' => $model->alias,
            'inscricao_estadual' => $model->inscricao_estadual,
            'inscricao_municipal' => $model->inscricao_municipal,
            'tipo_logradouro' => $model->tipo_logradouro,
            'logradouro' => $model->logradouro,
            'complemento' => $model->complemento,
            'numero' => $model->numero,
            'bairro' => $model->bairro,
            'cep' => $model->cep,
            'city_id' => $model->city_id,
            'telefone_num' => $model->telefone_num,
            'telefone_ddd' => $model->telefone_ddd,
            'email' => $model->email,
            'regime_tributario' => $model
        ];
    }
}
