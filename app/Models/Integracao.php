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
}
