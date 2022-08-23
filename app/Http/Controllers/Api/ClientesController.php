<?php

namespace App\Http\Controllers\Api;

use App\Models\Cliente;
use App\Models\Venda;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function search(Request $request)
    {
        $term = $request->get('term', '');
        // TODO refatorar para Full Text Search
        $clientes = Cliente::where('nome', 'like', '%'.$term.'%')
                            ->orWhere('alias', 'like', '%'.$term.'%')
                            ->orWhere('documento', 'like', '%'.$term.'%')
                            ->paginate(15);

        return $clientes->toJson();
    }
}
