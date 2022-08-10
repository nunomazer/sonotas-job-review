<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo de configuração da integração com plataformas de vendas / compras / erp ...
 */
class Integracao extends Model
{
    use HasFactory;

    protected $table = 'empresa_integracoes';

    protected $guarded = [
        'id'
    ];

    protected $casts = [
        'fields' => 'json',
        'data_inicio' => 'date',
        'transmissao_automatica' => 'boolean',
        'transmissao_apenas_dias_uteis' => 'boolean',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function scopeIsAtivo($query)
    {
        return $query->where('ativo', true);
    }
}
