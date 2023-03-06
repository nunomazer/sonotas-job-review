<?php

namespace App\Http\Controllers\Api;

use App\Models\Empresa;
use App\Models\Venda;
use App\Models\VendaItem;
use App\Services\Sped\SpedService;
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
    private function findVenda($id)
    {
        return Venda::where('id', $id)
            ->with('itens')
            ->whereHas('empresa', function ($query) {
                $query->where('owner_user_id', auth()->user()->id);
            })
            ->first();
    }

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
        $venda = $this->findVenda($id);

        if ($venda == null) {
            return $this->api->statusResponse(404, 'Venda não encontrada ou não pertencente ao afiliado');
        }

        return $this->api->itemResponse(
            $venda, VendaTransformer::class
        );
    }

    /**
     * Criar
     *
     * Cria uma nova Venda associada ao Afiliado autenticado pela API.
     *
     * @responseFile resources/docs/api/venda.json
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Empresa::userIsOwner()->where('id', $request->empresa_id)->first() == null) {
            return $this->api->statusResponse(422, 'Empresa informada não está associada ao afiliado');
        }

        $vendaArray = $request->toArray();

        $itens = collect(request()->get('itens'))
            ->map(function ($item) {
                return new VendaItem([
                    'item_id'   => $item['id'],
                    'qtde'      => $item['qtde'],
                    'valor'     => $item['valor'],
                    'desconto'  => $item['desconto'],
                    'tipo_documento' => request()->get('tipo_documento', SpedService::DOCTYPE_NFSE),
                ]);
            });

        return $this->api->itemResponse(
            (new VendasService())->create($vendaArray, $itens->all()),
            VendaTransformer::class
        );
    }

    /**
     * Atualizar
     *
     * Atualiza o registro de uma Venda associada ao Afiliado autenticado pela API.
     *
     * @responseFile resources/docs/api/servico.json
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $venda = $this->findVenda($id);

        if ($venda == null) {
            return $this->api->statusResponse(404, 'Venda não encontrada ou não pertencente ao afiliado');
        }

        if (Empresa::userIsOwner()->where('id', $request->empresa_id)->first() == null) {
            return $this->api->statusResponse(422, 'Empresa informada não está associada ao afiliado');
        }

        $vendaArray = $request->toArray();

        $itens = collect(request()->get('itens'))
            ->map(function ($item) {
                return new VendaItem([
                    'item_id'   => $item['id'],
                    'qtde'      => $item['qtde'],
                    'valor'     => $item['valor'],
                    'desconto'  => $item['desconto'],
                    'tipo_documento' => request()->get('tipo_documento', SpedService::DOCTYPE_NFSE),
                ]);
            });

        Venda::unguard();
        $venda->fill($vendaArray);

        return $this->api->itemResponse(
            (new VendasService())->update($venda, $itens->all()),
            VendaTransformer::class
        );
    }

    /**
     * Pesquisar
     *
     * Retorna array com uma coleção de objetos de vendas de acordo com os filtros utilizados para pesquisa
     *
     * @queryParam filter[empresa_id] string Critério de pesquisa exata pelo id da empresa que as vendas estão associadas. Example: 2
     * @queryParam filter[updated_after] string Critério de pesquisa que retorna as vendas alteradas a partir da data do filtro.
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
                AllowedFilter::exact('empresa_id'),
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
