<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaAssinatura extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'empresa_assinatura';

    protected $casts = [
        'status_historico' => 'json',
    ];

    public function plano()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }

}
