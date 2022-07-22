<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'city_id', 'id', 'city');
    }

    /**
     * Pesquisa e retorna um cliente pelo documento
     * @param string $documento
     * @return Cliente
     */
    public static function getByDoc(string $documento)
    {
        return Cliente::where('documento', $documento)->first();
    }
}
