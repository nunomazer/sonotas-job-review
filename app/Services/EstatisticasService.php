<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

class EstatisticasService
{
    const EMPRESAS_ATIVAS = 'empresas_ativas';

    private array $estatisticas = [
        self::EMPRESAS_ATIVAS => null,
    ];

    public function getCacheKey(User $user) : string
    {
        return 'estatisticas_user_'.$user->id;
    }

    public function clearCache(User $user, string $key = null) : void
    {

        Cache::forget($this->getCacheKey($user));
    }

    public function getEmpresasAtivas(User $user) : int
    {
        return Cache::remember($this->getCacheKey($user), 60*120, function () use ($user) {
            return $user->empresas->where('ativo', true)->count();
        });
    }
}
