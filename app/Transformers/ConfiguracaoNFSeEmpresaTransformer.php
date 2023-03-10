<?php

namespace App\Transformers;

use App\Models\EmpresaNFSConfig;
use App\Models\Servico;
use League\Fractal\TransformerAbstract;

class ConfiguracaoNFSeEmpresaTransformer extends TransformerAbstract
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
     * @param Servico $model
     * @return array
     */
    public function transform(EmpresaNFSConfig $model)
    {
        return $model->makeHidden(['id', 'deleted_at', 'certificado_id'])->toArray();
    }
}
