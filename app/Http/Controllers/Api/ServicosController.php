<?php

namespace App\Http\Controllers\Api;

use App\Models\Cliente;
use App\Models\Servico;
use App\Models\Venda;
use Illuminate\Http\Request;

class ServicosController extends Controller
{
    public function search(Request $request)
    {
        $term = $request->get('term', '');
        // TODO refatorar para Full Text Search
        $servicos = Servico::where('nome', 'ilike', '%'.$term.'%')
                            ->orWhere('descricao', 'ilike', '%'.$term.'%')
                            ->paginate(15);

        return $servicos->toJson();
    }
}
