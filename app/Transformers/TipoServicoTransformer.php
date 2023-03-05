<?php

namespace App\Transformers;

use App\Models\TipoServico;
use League\Fractal\TransformerAbstract;

class TipoServicoTransformer extends TransformerAbstract
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
     * @param TipoServico $tipoServico
     * @return array
     */
    public function transform(TipoServico $tipoServico)
    {
        return $tipoServico->toArray();
    }
}
