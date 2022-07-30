<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kayo\StatesAndCitiesIbge\Models\City;
use Spatie\Onboard\GetsOnboarded;

class Empresa extends Model
{
    use HasFactory, GetsOnboarded;

    protected $guarded = ['id'];

    protected $casts = [
        'ativo' => 'boolean',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_user_id', 'id');
    }

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

    public function servicos()
    {
        return $this->hasMany(Servico::class);
    }

    public function integracoes()
    {
        return $this->hasMany(Integracao::class);
    }

    public function configuracao_nfs()
    {
        return $this->hasOne(EmpresaNFSConfig::class);
    }
}
