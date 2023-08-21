<?php

namespace App\Http\Controllers\Api;

use App\Models\TipoLogradouro;
use App\Transformers\TipoLogradouroTransformer;

/**
 * @group Tabelas auxiliares
 */
class TiposLogradouroController extends Controller
{
   /**
     * Tipos de Logradouro - listar
     *
     * Lista os tipos de logradouro permitidos.
     *
     * @responseFile resources/docs/api/tipos_logradouro.json
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->api->collectionResponse(collect(TipoLogradouro::tipos), TipoLogradouroTransformer::class);
    }
}
