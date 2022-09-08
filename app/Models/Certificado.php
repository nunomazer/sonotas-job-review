<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Certificado extends Model
{
    use HasFactory;

    protected $fillable = ['file', 'password', 'expires_at', 'sped_id'];
    protected $casts = ['expires_at' => 'datetime'];

     
    public function getDataValidadeAttribute()
    {
        return Carbon::parse($this->attributes['expires_at'])->format('d/m/Y H:i');
    }

    public function getIsCertificadoValidoAttribute()
    {
        return Carbon::parse($this->attributes['expires_at'])->gt(now());
    }
 
}
