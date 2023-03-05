<?php

namespace App\Http\Controllers\Api;

use App\Models\TipoLogradouro;
use App\Services\Sped\SpedRegimesTributarios;
use App\Services\Sped\SpedRegimesTributariosEspeciais;
use App\Transformers\RegimeTributarioEspecialTransformer;
use App\Transformers\RegimeTributarioTransformer;
use App\Transformers\TipoLogradouroTransformer;

/**
 * @group Tabelas auxiliares
 */
class RegimesTributariosEspeciaisController extends Controller
{
   /**
     * Regimes Tributarios Especiais - listar
     *
     * Lista os códigos de Regimes Tributarios Especiais permitidos.
     *
     * @responseFile resources/docs/api/regimes_tributarios.json
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->api->collectionResponse(collect(SpedRegimesTributariosEspeciais::toArray()), RegimeTributarioEspecialTransformer::class);
    }
}
