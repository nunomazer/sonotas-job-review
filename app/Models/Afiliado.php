<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afiliado extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'ativo' => 'boolean',
    ];

    public function scopeIsAtivo($query)
    {
        return $query->where('ativo', true);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'city_id', 'id', 'city');
    }

    public function empresas()
    {
        return $this->hasMany(Empresa::class);
    }
}
