<?php

namespace App\Http\Middleware;

use App\Facades\CacheSoNotas;
use App\Services\MoneyFlow\MoneyFlowAssinaturaStatus;
use Closure;
use Illuminate\Http\Request;

class CheckUserHasSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // @TODO refatorar para um serviço
        $cacheId = CacheSoNotas::idxIntegracoesUsuarioStatus(auth()->user()); // para evitar não estar logado e dar pau com user null
        if ($cacheId) {
            $assinaturasAtivas = cache()->remember($cacheId, CacheSoNotas::ttlIntegracoesUsuarioStatus(),
                fn() => auth()->user()->empresas->map(function ($empresa) {
                    return $empresa->assinatura?->status == MoneyFlowAssinaturaStatus::ATIVA ? $empresa->assinatura : null;
                })->filter(fn($assinatura) => $assinatura != null)
            );

            view()->share('assinaturasAtivas', $assinaturasAtivas);
        }

        return $next($request);
    }
}
