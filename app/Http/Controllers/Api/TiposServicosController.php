<?php

namespace App\Http\Controllers\Api;

use App\Models\TipoServico;
use App\Transformers\TipoServicoTransformer;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * @group Tabelas auxiliares
 */
class TiposServicosController extends Controller
{
    /**
     * Tipos Serviços - listar
     *
     * Lista os Tipos Serviços permitidos.
     *
     * @responseFile resources/docs/api/tipos_servicos.json
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposServicos = QueryBuilder::for(TipoServico::query())
        ->paginate($this->api->getPerPage())
        ->appends(request()->query());

        return $this->api->collectionResponse($tiposServicos, TipoServicoTransformer::class);
    }
}
