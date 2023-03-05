<?php

namespace App\Http\Controllers\Api;

use App\Models\Cidade;
use App\Transformers\CidadeTransformer;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * @group Tabelas auxiliares
 */
class CidadesController extends Controller
{
    /**
     * Cidades - listar
     *
     * Lista todos as cidades cadastradas.
     *
     * @responseFile resources/docs/api/cidades.json
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cidades = QueryBuilder::for(Cidade::query())
            ->paginate($this->api->getPerPage())
            ->appends(request()->query());

        return $this->api->collectionResponse($cidades, CidadeTransformer::class);
    }

    /**
     * Pesquisar
     *
     * Retorna array com uma coleção de objetos de cidades de acordo com os filtros utilizados para pesquisa
     *
     * @queryParam filter[nome] string Critério de pesquisa parcial pelo nome da cidade. Example: São
     * @queryParam filter[state_id] int Critério de pesquisa que retorna as cidades pelo id do estado.
     *
     * @responseFile resources/docs/api/cidades.json
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $cidades = QueryBuilder::for(Cidade::query())
            ->allowedFilters([
                AllowedFilter::partial('name'),
                AllowedFilter::exact('state_id'),
            ])
            ->paginate($this->api->getPerPage())
            ->appends(request()->query());

        return $this->api->collectionResponse($cidades, CidadeTransformer::class);
    }

    public function searchPrivado(Request $request)
    {
        $term = $request->get('term', '');
        $items = Cidade::with('estado')
                        ->where('name', 'ilike', '%'.$term.'%')
                        ->orWhere('ibge_id', 'ilike', '%'.$term.'%')
                        ->paginate(15);

        return $items->toJson();
    }
}
