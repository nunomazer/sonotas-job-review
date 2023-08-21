<?php

namespace App\Http\Controllers\Api;

use App\Models\TipoServico;
use App\Transformers\TipoServicoTransformer;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
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

    /**
     * Tipos de Serviço - Pesquisar
     *
     * Retorna array com uma coleção de objetos de Tipos de Serviços de acordo com os filtros utilizados para pesquisa
     *
     * @queryParam filter[codigo] string Critério de pesquisa parcial pelo código. Example: 01.
     * @queryParam filter[descricao] string Critério de pesquisa parcial pela descrição. Example: Análise
     *
     * @responseFile resources/docs/api/cnaes.json
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $models = QueryBuilder::for(TipoServico::query())
            ->allowedFilters([
                AllowedFilter::partial('codigo'),
                AllowedFilter::partial('descricao'),
            ])
            ->paginate($this->api->getPerPage())
            ->appends(request()->query());

        return $this->api->collectionResponse($models, TipoServicoTransformer::class);
    }
}
