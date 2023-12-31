<?php

namespace App\Models;

use App\Services\MoneyFlow\MoneyFlowAssinaturaStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kayo\StatesAndCitiesIbge\Models\City;
use Spatie\Onboard\GetsOnboarded;

class Empresa extends Model
{
    use HasFactory, GetsOnboarded;

    protected $guarded = ['id'];

    protected $casts = [
        'ativo' => 'boolean',
        'receber_notificacao_por_email' => 'boolean'
    ];

    public function scopeIsAtivo($query)
    {
        return $query->where('ativo', true);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_user_id', 'id');
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'city_id', 'id', 'city');
    }

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }

    public function servicos()
    {
        return $this->hasMany(Servico::class);
    }

    public function integracoes()
    {
        return $this->hasMany(Integracao::class);
    }

    public function configuracao_nfse()
    {
        return $this->hasOne(EmpresaNFSConfig::class);
    }

    public function assinatura()
    {
        return $this->hasOne(EmpresaAssinatura::class)
            ->where('status', MoneyFlowAssinaturaStatus::ATIVA)
            ->orWhere('status', MoneyFlowAssinaturaStatus::ATRASADA)
            ->orWhere('status', MoneyFlowAssinaturaStatus::PENDENTE)
            ->orWhere('status', MoneyFlowAssinaturaStatus::INADIMPLENTE);
    }

    public function assinaturas()
    {
        return $this->hasMany(EmpresaAssinatura::class);
    }

    public function vendas()
    {
        return $this->hasMany(Venda::class);
    }

    /**
     * Query que testa se o owner_user_id é igual ao id do usuário autenticado
     * @param $query
     * @return mixed
     */
    public function scopeUserIsOwner($query)
    {
        return $query->where('owner_user_id', auth()->user()->id);
    }
}
