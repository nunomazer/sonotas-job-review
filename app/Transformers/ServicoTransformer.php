<?php

namespace App\Transformers;

use App\Models\Servico;
use League\Fractal\TransformerAbstract;

class ServicoTransformer extends TransformerAbstract
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
     * @param Servico $servico
     * @return array
     */
    public function transform(Servico $servico)
    {
        return $servico->toArray();
    }
}
