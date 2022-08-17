<?php

namespace App\Services;

use App\Models\Servico;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class EstatisticasService
{
    const EMPRESAS_TOTAL = 'empresas_total';
    const EMPRESAS_ATIVAS = 'empresas_ativas';
    const SERVICOS_TOTAL = 'servicos_total';
    const SERVICOS_ATIVOS = 'servicos_ativos';

    private array $estatisticas = [
        self::EMPRESAS_ATIVAS => null,
        self::EMPRESAS_TOTAL => null,
        self::SERVICOS_TOTAL => null,
        self::SERVICOS_ATIVOS => null,
    ];

    private User $user;
    private Carbon $data_inicial;
    private Carbon $data_final;

    public function __construct(User $user, Carbon $data_inicial, Carbon $data_final)
    {
        $this->user = $user;
        $this->data_inicial = $data_inicial;
        $this->data_final = $data_final;
    }

    public function getCacheKey() : string
    {
        return 'estatisticas_user_'.$this->user->id;
    }

    public function clearCache() : void
    {
        Cache::forget($this->getCacheKey());
    }

    public function calcularEstatisticas(bool $clearCache = false) : array
    {
        if ($clearCache) $this->clearCache();

        $this->estatisticas = Cache::remember($this->getCacheKey(), 60*120, function () {
            return [
                self::EMPRESAS_ATIVAS => $this->calcularEmpresasAtivas(),
                self::EMPRESAS_TOTAL => $this->calcularEmpresasTotal(),
                self::SERVICOS_ATIVOS => $this->calcularServicosAtivos(),
                self::SERVICOS_TOTAL => $this->calcularServicosTotal(),
            ];
        });

        return $this->estatisticas;
    }

    private function calcularEmpresasAtivas()
    {
        return $this->user->empresas->where('ativo', true)->count();
    }

    private function calcularEmpresasTotal()
    {
        return $this->user->empresas->count();
    }

    private function calcularServicosAtivos()
    {
        return Servico::isAtivo()
                        ->whereIn('empresa_id', $this->user->empresasIdsArray())
                        ->count();
    }

    private function calcularServicosTotal()
    {
        return Servico::whereIn('empresa_id', $this->user->empresasIdsArray())->count();
    }

    public function getEmpresasAtivas(User $user) : int
    {
        return $this->estatisticas[self::EMPRESAS_ATIVAS];
    }

    public function toArray()
    {
        return $this->estatisticas;
    }
}
