<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\EmpresaRequest;
use App\Models\Empresa;
use App\Services\EmpresaService;
use App\Transformers\EmpresaTransformer;

/**
 * @group Empresas
 */
class EmpresasController extends Controller
{
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
        $empresa = Empresa::where('id', $id)
            ->where('owner_user_id', auth()->user()->id)
            ->first();

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

        return $this->api->itemResponse(
            (new EmpresaService())->create($empresaArray), EmpresaTransformer::class);
    }
}
