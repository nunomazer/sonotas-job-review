<?php

namespace App\Http\Controllers\Api;

use App\Models\Cidade;
use App\Transformers\CidadeTransformer;
use Illuminate\Http\Request;
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

    public function search(Request $request)
    {
        $term = $request->get('term', '');
        $items = Cidade::with('estado')
                        ->where('name', 'ilike', '%'.$term.'%')
                        ->orWhere('ibge_id', 'ilike', '%'.$term.'%')
                        ->paginate(15);

        return $items->toJson();
    }
}
