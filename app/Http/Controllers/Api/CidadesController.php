<?php

namespace App\Http\Controllers\Api;

use App\Models\Cidade; 
use Illuminate\Http\Request;

class CidadesController extends Controller
{
    public function search(Request $request)
    {
        $term = $request->get('term', ''); 
        $items = Cidade::with('estado')
                        ->where('name', 'ilike', '%'.$term.'%')
                        ->orWhere('ibge_id', 'ilike', '%'.$term.'%') 
                        ->paginate(15);

        return $items->toJson();
    }
}
