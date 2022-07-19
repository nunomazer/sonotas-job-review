<?php

namespace App\Models;

use App\Services\Integra\IntegraService;
use App\Services\Integra\Platform;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Serviços cadastrados da empresa
 */
class ServicoIntegracao extends Model
{
    use HasFactory;

    protected $table = 'servico_integracao';

    protected $guarded = ['id'];
    /**
     * Retorna relacionamento com Tipo de serviço, LC116
     * @return void
     */
    public function tipo()
    {
        return $this->belongsTo(TipoServico::class, 'tipo_servico_codigo');
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class);
    }

}
