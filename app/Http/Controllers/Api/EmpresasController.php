<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\EmpresaRequest;
use App\Services\EmpresaService;
use App\Transformers\EmpresaTransformer;

/**
 * @group Empresas
 */
class EmpresasController extends Controller
{
   /**
     * Empresas - Criar nova
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
