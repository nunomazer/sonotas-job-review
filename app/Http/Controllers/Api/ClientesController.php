<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use App\Services\ClienteService;
use App\Transformers\ClienteTransformer;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ClientesController extends Controller
{
    /**
     * Get by Id
     *
     * Retorna um cliente pelo Id se ela for associada ao afiliado.
     *
     * @responseFile resources/docs/api/cliente.json
     *
     * @return \Illuminate\Http\Response
     */
    public function getById(int $id)
    {
        $cliente = Cliente::where('id', $id)
            ->with('empresa')
            ->whereHas('empresa', function ($query) {
                $query->where('owner_user_id', auth()->user()->id);
            })
            ->first();

        if ($cliente == null) {
            return $this->api->statusResponse(404, 'Cliente não encontrado ou não pertencente ao afiliado');
        }

        return $this->api->itemResponse(
            $cliente, ClienteTransformer::class);
    }

    /**
     * Criar
     *
     * Cria um novo cliente associado ao Afiliado autenticado pela API.
     *
     * @responseFile resources/docs/api/cliente.json
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        $clienteArray = $request->toArray();
        $clienteArray['owner_user_id'] = auth()->user()->id;

        return $this->api->itemResponse(
            (new ClienteService())->create($clienteArray), ClienteTransformer::class);
    }

    /**
     * Pesquisar
     *
     * Retorna array com uma coleção de objetos de clientes de acordo com os filtros utilizados para pesquisa
     *
     * @queryParam filter[nome] string Critério de pesquisa parcial pelo nome do Cliente. Example: Molas
     * @queryParam filter[updated_after] string Critério de pesquisa que retorna os clientes alterados a partir da data do filtro.
     *
     * @responseFile resources/docs/api/clientes.json
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // $clientes = QueryBuilder::for(Cliente::query())
        // ->allowedFilters([
        //     AllowedFilter::partial('nome'),
        //     AllowedFilter::callback('updated_after', function (Builder $query, $value, string $property)
        //     {
        //         $d = \Carbon\Carbon::createFromFormat('Y-m-d', $value)->startOfDay();
        //         $query->where('updated_at', '>=', $d);
        //         $query->orWhere('deleted_at', '>=', $d);
        //     }),
        // ])
        // ->paginate($this->api->getPerPage())
        // ->appends(request()->query());

        // return $this->api->collectionResponse($clientes, ClienteTransformer::class);

        $term = $request->get('term', '');
        // TODO refatorar para Full Text Search
        $clientes = Cliente::where('nome', 'ilike', '%'.$term.'%')
                            ->orWhere('alias', 'ilike', '%'.$term.'%')
                            ->orWhere('documento', 'ilike', '%'.$term.'%')
                            ->paginate(15);

        return $clientes->toJson();
    }
}
