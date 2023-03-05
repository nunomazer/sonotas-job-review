<?php

namespace App\Http\Controllers\Api;

use App\Models\TipoLogradouro;
use App\Services\Sped\SpedRegimesTributarios;
use App\Transformers\RegimeTributarioTransformer;
use App\Transformers\TipoLogradouroTransformer;

/**
 * @group Tabelas auxiliares
 */
class RegimesTributariosController extends Controller
{
   /**
     * Regimes Tributarios - listar
     *
     * Lista os códigos de Regimes Tributarios permitidos.
     *
     * @responseFile resources/docs/api/regimes_tributarios.json
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->api->collectionResponse(collect(SpedRegimesTributarios::toArray()), RegimeTributarioTransformer::class);
    }
}
