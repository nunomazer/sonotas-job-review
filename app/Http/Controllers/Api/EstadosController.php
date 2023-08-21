<?php

namespace App\Http\Controllers\Api;

use App\Models\Estado;
use App\Transformers\EstadoTransformer;
use Illuminate\Http\Request;

/**
 * @group Tabelas auxiliares
 */
class EstadosController extends Controller
{
   /**
     * Estados - listar
     *
     * Lista todos os estados cadastrados.
     *
     * @responseFile resources/docs/api/estados.json
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->api->collectionResponse(Estado::all(), EstadoTransformer::class);
    }
}
