<?php

namespace App\Models;

use App\Services\Sped\SpedService;
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
        return $this->hasMany(VendaItem::class, 'venda_id');
    }

    public function tipo_servico()
    {
        return $this->belongsTo(TipoServico::class);
    }

    public function documento_fiscal()
    {
        if ($this->tipo_documento == SpedService::DOCTYPE_NFSE) {
            return $this->hasOne(NFSe::class);
        }

        return null;
    }

}
