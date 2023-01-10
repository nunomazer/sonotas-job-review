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
        'features' => 'json',
    ];

    public function plano()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    /**
     * Assinatura possui a feature
     *
     * @param $slug
     * @return bool
     */
    public function featureHas($slug)
    {
        return isset($this->features[$slug]);
    }

    /**
     * Valor base, inicial para a feature
     * @param $slug
     * @return void
     */
    public function featureBase($slug)
    {
        if ($this->featureHas($slug)) {
            return $this->features[$slug]['value'];
        }
    }

    /**
     * Valor de saldo no momento para a feature
     *
     * @param $slug
     * @return void
     */
    public function featureSaldo($slug)
    {
        if ($this->featureHas($slug)) {
            return $this->features[$slug]['balance'];
        }

        return false;
    }

    public function featureSaldoIncrement($slug, $value = 1)
    {
        if ($this->featureHas($slug)) {
            $this->features[$slug]['balance'] += $value;
            $this->save();
        }

        return $this->featureSaldo($slug);
    }

    public function featureSaldoDecrement($slug, $value = 1)
    {
        if ($this->featureHas($slug)) {
            $this->features[$slug]['balance'] -= $value;
            $this->save();
        }

        return $this->featureSaldo($slug);
    }
}
