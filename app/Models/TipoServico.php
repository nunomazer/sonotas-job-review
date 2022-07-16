<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Serviços da tabela de lei LC116
 */
class TipoServico extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'descricao',
    ];
}
