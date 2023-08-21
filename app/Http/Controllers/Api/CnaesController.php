<?php

namespace App\Http\Controllers\Api;

use App\Models\Cnae;
use App\Transformers\CnaeTransformer;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
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

    /**
     * CNAES - Pesquisar
     *
     * Retorna array com uma coleção de objetos de CNAES de acordo com os filtros utilizados para pesquisa
     *
     * @queryParam filter[descricao] string Critério de pesquisa parcial pelo nome do CNAE. Example: Extração
     *
     * @responseFile resources/docs/api/cnaes.json
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $cnae = QueryBuilder::for(Cnae::query())
            ->allowedFilters([
                AllowedFilter::partial('descricao'),
            ])
            ->paginate($this->api->getPerPage())
            ->appends(request()->query());

        return $this->api->collectionResponse($cnae, CnaeTransformer::class);
    }
}
