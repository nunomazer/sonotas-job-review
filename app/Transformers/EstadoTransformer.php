<?php

namespace App\Transformers;

use App\Models\Estado;
use League\Fractal\TransformerAbstract;

class EstadoTransformer extends TransformerAbstract
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
    public function transform(Estado $model)
    {
        return $model->toArray();
    }
}
