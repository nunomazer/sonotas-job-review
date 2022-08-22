<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Serviços cadastrados da empresa
 */
class Servico extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeIsAtivo($query)
    {
        return $query->where('ativo', true);
    }

    /**
     * Retorna relacionamento com Tipo de serviço, LC116
     * @return void
     */
    public function tipo()
    {
        return $this->belongsTo(TipoServico::class, 'tipo_servico_codigo');
    }

    public function integracoes()
    {
        return $this->hasMany(ServicoIntegracao::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
