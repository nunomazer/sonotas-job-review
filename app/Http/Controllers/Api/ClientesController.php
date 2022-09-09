<?php

namespace App\Http\Controllers\Api;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function search(Request $request)
    {
        $term = $request->get('term', '');
        // TODO refatorar para Full Text Search
        $clientes = Cliente::where('nome', 'ilike', '%'.$term.'%')
                            ->orWhere('alias', 'ilike', '%'.$term.'%')
                            ->orWhere('documento', 'ilike', '%'.$term.'%')
                            ->paginate(15);

        return $clientes->toJson();
    }
}
