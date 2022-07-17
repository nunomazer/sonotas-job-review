<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NFSe extends Model
{
    use HasFactory;

    protected $table = 'notas_servico';

    protected $casts = [
        'emitido_em',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
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
