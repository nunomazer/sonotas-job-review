<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'data_transacao' => 'datetime',
        'data_emissao_planejada' => 'datetime',
        'driver_dados' => 'json',
        'status_historico' => 'json',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function itens()
    {
        return $this->hasMany(NFSeItemServico::class, 'nota_servico_id');
    }

    public function tipo_servico()
    {
        return $this->belongsTo(TipoServico::class);
    }

}
