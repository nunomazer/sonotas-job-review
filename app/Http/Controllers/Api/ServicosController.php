<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ServicoRequest;
use App\Models\Servico;
use App\Services\ServicoService;
use App\Transformers\ServicoTransformer;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * @group Serviços
 */
class ServicosController extends Controller
{
/**
     * Get by Id
     *
     * Retorna um serviço pelo Id se ela for associada ao afiliado.
     *
     * @responseFile resources/docs/api/servico.json
     *
     * @return \Illuminate\Http\Response
     */
    public function getById(int $id)
    {
        $servico = Servico::where('id', $id)
            ->with('empresa')
            ->whereHas('empresa', function ($query) {
                $query->where('owner_user_id', auth()->user()->id);
            })
            ->first();

        if ($servico == null) {
            return $this->api->statusResponse(404, 'Serviço não encontrado ou não pertencente ao afiliado');
        }

        return $this->api->itemResponse(
            $servico, ServicoTransformer::class);
    }

    /**
     * Criar
     *
     * Cria um novo serviço associado ao Afiliado autenticado pela API.
     *
     * @responseFile resources/docs/api/servico.json
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ServicoRequest $request)
    {
        $servicoArray = $request->toArray();
        $servicoArray['owner_user_id'] = auth()->user()->id;

        return $this->api->itemResponse(
            (new ServicoService())->create($servicoArray), ServicoTransformer::class);
    }

    /**
     * Pesquisar
     *
     * Retorna array com uma coleção de objetos de serviços de acordo com os filtros utilizados para pesquisa
     *
     * @queryParam filter[nome] string Critério de pesquisa parcial pelo nome do serviço. Example: Ebook
     * @queryParam filter[empresa_id] string Critério de pesquisa exata pelo id da empresa que os serviços estão associados. Example: 2
     * @queryParam filter[updated_after] string Critério de pesquisa que retorna os serviços alterados a partir da data do filtro.
     *
     * @responseFile resources/docs/api/empresas.json
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
         $servicos = QueryBuilder::for(Servico::query())
             ->allowedFilters([
                 AllowedFilter::partial('nome'),
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

         return $this->api->collectionResponse($servicos, ServicoTransformer::class);
    }

    /**
     * Pesquisar privado para front
     */
    public function searchPrivado(Request $request)
    {
        $term = $request->get('term', '');
        // TODO refatorar para Full Text Search
        $servicos = Servico::where('nome', 'ilike', '%'.$term.'%')
                            ->orWhere('descricao', 'ilike', '%'.$term.'%')
                            ->paginate(15);

        return $servicos->toJson();
    }
}
