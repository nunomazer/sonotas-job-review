<?php

namespace App\Http\Controllers\Api;

use App\Models\Venda;
use App\Services\VendasService;
use App\Transformers\VendaTransformer;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * @group Vendas
 */
class VendasController extends Controller
{
    /**
     * Get by Id
     *
     * Retorna uma venda pelo Id se ela for associada ao afiliado.
     *
     * @responseFile resources/docs/api/venda.json
     *
     * @return \Illuminate\Http\Response
     */
    public function getById(int $id)
    {
        $venda = Venda::where('id', $id)
            //->where('owner_user_id', auth()->user()->id)
            ->first();

        if ($venda == null) {
            return $this->api->statusResponse(404, 'Venda não encontrada ou não pertencente ao afiliado');
        }

        return $this->api->itemResponse(
            $venda, VendaTransformer::class);
    }

    /**
     * Criar
     *
     * Cria uma nova venda associada ao Afiliado autenticado pela API.
     *
     * @responseFile resources/docs/api/venda.json
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vendaArray = $request->toArray();
        $vendaArray['owner_user_id'] = auth()->user()->id;

        return $this->api->itemResponse(
            (new VendasService())->create($vendaArray,[]), VendaTransformer::class);
    }

    /**
     * Pesquisar
     *
     * Retorna array com uma coleção de objetos de vendas de acordo com os filtros utilizados para pesquisa
     *
     * @queryParam filter[nome] string Critério de pesquisa parcial pelo nome da venda. Example: Molas
     * @queryParam filter[updated_after] string Critério de pesquisa que retorna as vendas alterados a partir da data do filtro.
     *
     * @responseFile resources/docs/api/empresas.json
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $vendas = QueryBuilder::for(Venda::query())
            ->allowedFilters([
                AllowedFilter::partial('nome'),
                AllowedFilter::callback('updated_after', function (Builder $query, $value, string $property)
                {
                    $d = \Carbon\Carbon::createFromFormat('Y-m-d', $value)->startOfDay();
                    $query->where('updated_at', '>=', $d);
                    $query->orWhere('deleted_at', '>=', $d);
                }),
            ])
            ->paginate($this->api->getPerPage())
            ->appends(request()->query());

        return $this->api->collectionResponse($vendas, VendaTransformer::class);
    }
}
