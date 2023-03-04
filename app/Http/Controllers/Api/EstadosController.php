<?php

namespace App\Http\Controllers\Api;

use App\Models\Estado;
use Illuminate\Http\Request;

class EstadosController extends Controller
{
   /**
     * Estados - listar
     *
     * Lista todos os estados cadastrados.
     *
     * @responseFile resources/docs/api/estados.json
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Estado::query()->get());
    }
}
