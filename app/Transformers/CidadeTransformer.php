<?php

namespace App\Transformers;

use App\Models\Cidade;
use League\Fractal\TransformerAbstract;

class CidadeTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Cidade $model)
    {
        return [
            'id' => $model->id,
            'state_id' => $model->state_id,
            'ibge_id' => $model->ibge_id,
            'nome' => $model->name,
        ];
    }
}
