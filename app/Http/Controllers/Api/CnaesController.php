<?php

namespace App\Http\Controllers\Api;

use App\Models\Cnae;
use App\Transformers\CnaeTransformer;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * @group Tabelas auxiliares
 */
class CnaesController extends Controller
{
    /**
     * CNAEs - listar
     *
     * Lista os CNAEs permitidos.
     *
     * @responseFile resources/docs/api/cnaes.json
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cnaes = QueryBuilder::for(Cnae::query())
        ->paginate($this->api->getPerPage())
        ->appends(request()->query());

        return $this->api->collectionResponse($cnaes, CnaeTransformer::class);
    }
}
