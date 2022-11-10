<?php

namespace App\Models;

use App\Services\Sped\SpedStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
        'cancelamento_codigo',
        'cancelamento_motivo',
        'cancelamento_protocolo'
    ];

    protected $casts = [
        'emitido_em' => 'datetime',
        'status_historico' => 'json',
        'driver_dados' => 'json',
    ];

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

    public function getCanCancelAttribute()
    {
        return true;
        return $this->attributes['status'] == SpedStatus::CONCLUIDO && 
            empty($this->attributes['cancelamento_protocolo']) /*&& 
            Carbon::parse($this->attributes['emitido_em'])->gt(now() - 2)*/;
        //validar quantos dias permite cancelar
        //
    }    
}
