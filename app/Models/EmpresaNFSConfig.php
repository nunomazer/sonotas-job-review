<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaNFSConfig extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'empresa_nfs_configuracoes';
    
    public function certificado()
    {
        return $this->belongsTo(Certificado::class);
    }
}
