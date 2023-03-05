<?php

namespace App\Transformers;

use App\Models\Cnae;
use League\Fractal\TransformerAbstract;

class CnaeTransformer extends TransformerAbstract
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
     * @param Cnae $cnae
     * @return array
     */
    public function transform(Cnae $cnae)
    {
        return $cnae->toArray();
    }
}
