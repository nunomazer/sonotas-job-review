<?php

namespace App\Transformers;

use App\Models\Cidade;
use App\Models\Cliente;
use League\Fractal\TransformerAbstract;

class CidadeTransformer extends TransformerAbstract
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
     * @param Cidade $cidade
     * @return array
     */
    public function transform(Cidade $cidade)
    {
        return $cidade->toArray();
    }
}
