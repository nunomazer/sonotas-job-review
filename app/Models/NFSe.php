<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NFSe extends Model
{
    use HasFactory;

    protected $table = 'notas_servico';

    protected $fillable = [
        'venda_id',
        'driver',
        'driver_id',
        'status',
        'status_historico',
        'emitido_em',
        'empresa_id',
        'cliente_id',
        'valor',
        'driver_dados',
    ];

    protected $casts = [
        'emitido_em' => 'datetime',
        'status_historico' => 'json',
        'driver_dados' => 'json',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function venda() {
        return $this->belongsTo(Venda::class);
    }

    public function itens_servico()
    {
        return $this->hasMany(NFSeItemServico::class, 'nota_servico_id');
    }

    public function tipo_servico()
    {
        return $this->belongsTo(TipoServico::class);
    }

}
