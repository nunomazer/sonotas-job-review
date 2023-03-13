<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\ConfiguracaoNfseEmpresaRequest;
use App\Http\Requests\Api\EmpresaRequest;
use App\Models\Empresa;
use App\Services\EmpresaService;
use App\Transformers\ConfiguracaoNFSeEmpresaTransformer;
use App\Transformers\EmpresaTransformer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * @group Empresas
 */
class EmpresasController extends Controller
{
    private function findEmpresa($id)
    {
        return Empresa::where('id', $id)
            ->where('owner_user_id', auth()->user()->id)
            ->first();
    }

   /**
     * Get by Id
     *
     * Retorna uma empresa pelo Id se ela for associada ao afiliado.
     *
     * @responseFile resources/docs/api/empresa.json
     *
     * @return \Illuminate\Http\Response
     */
    public function getById(int $id)
    {
        $empresa = $this->findEmpresa($id);

        if ($empresa == null) {
            return $this->api->statusResponse(404, 'Empresa não encontrada ou não pertencente ao afiliado');
        }

        return $this->api->itemResponse(
            $empresa, EmpresaTransformer::class);
    }

    /**
     * Criar
     *
     * Cria uma nova empresa associada ao Afiliado autenticado pela API.
     *
     * @responseFile resources/docs/api/empresa.json
     *
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {
        $empresaArray = $request->toArray();
        $empresaArray['owner_user_id'] = auth()->user()->id;

        return response($this->api->itemResponse(
            (new EmpresaService())->create($empresaArray), EmpresaTransformer::class),
            Response::HTTP_CREATED);
    }

    /**
     * Atualizar
     *
     * Atualiza o registro de uma empresa associada ao Afiliado autenticado pela API.
     *
     * @responseFile resources/docs/api/empresa.json
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaRequest $request, $id)
    {
        $empresa = $this->findEmpresa($id);

        if ($empresa == null) {
            return $this->api->statusResponse(404, 'Empresa não encontrada ou não pertencente ao afiliado');
        }

        $empresaArray = $request->toArray();
        $empresaArray['owner_user_id'] = auth()->user()->id;

        Empresa::unguard();
        $empresa->fill($empresaArray);

        return $this->api->itemResponse(
            (new EmpresaService())->update($empresa), EmpresaTransformer::class);
    }

    /**
     * Pesquisar
     *
     * Retorna array com uma coleção de objetos de empresas de acordo com os filtros utilizados para pesquisa
     *
     * @queryParam filter[nome] string Critério de pesquisa parcial pelo nome da empresa. Example: Molas
     * @queryParam filter[updated_after] string Critério de pesquisa que retorna as empresas alterados a partir da data do filtro.
     *
     * @responseFile resources/docs/api/empresas.json
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $empresas = QueryBuilder::for(Empresa::query())
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

        return $this->api->collectionResponse($empresas, EmpresaTransformer::class);
    }

    /**
     * Configuração da NFSe
     *
     * Cria ou atualiza a configuração padrão de uma NFSe para empresa. Esta configuração é utilizada como valores
     * padrão para os serviços criados para a empresa. Desta maneira, se o serviço não receber um dos campos existentes
     * na configuração da nfse, o sistema busca o padrão para o serviço.
     *
     * @responseFile resources/docs/api/empresa.json
     *
     * @return \Illuminate\Http\Response
     */
    public function updateConfiguracaoNfse(ConfiguracaoNfseEmpresaRequest $request, $id)
    {
        $empresa = $this->findEmpresa($id);

        if ($empresa == null) {
            return $this->api->statusResponse(404, 'Empresa não encontrada ou não pertencente ao afiliado');
        }

        $configArray = $request->toArray();
        $configuraccaoNfse = (new EmpresaService())->createConfigNFSe($empresa, $configArray)->configuracao_nfse;
        return response($this->api->itemResponse($configuraccaoNfse, ConfiguracaoNFSeEmpresaTransformer::class)
            , Response::HTTP_CREATED);
    }
}
