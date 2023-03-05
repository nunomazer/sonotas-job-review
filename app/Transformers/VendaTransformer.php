<?php

namespace App\Transformers;

use App\Models\Venda;
use League\Fractal\TransformerAbstract;

class VendaTransformer extends TransformerAbstract
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
     * @param Venda $venda
     * @return array
     */
    public function transform(Venda $venda)
    {
        return $venda->toArray();
    }
}
