<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model pivot de ligação de Notas de Serviço com Serviço
 */
class VendaItem extends Model
{
    use HasFactory;

    protected $table = 'venda_item';

    protected $guarded = ['id'];

    public function servico()
    {
        return $this->belongsTo(Servico::class, 'item_id');
    }

}
