<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kayo\StatesAndCitiesIbge\Models\City;

class Empresa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function certificado()
    {
        return $this->belongsTo(Certificado::class);
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'city_id', 'id', 'city');
    }

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }

    public function integracoes()
    {
        return $this->hasMany(Integracao::class);
    }
}
