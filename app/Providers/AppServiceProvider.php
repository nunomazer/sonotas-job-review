<?php

namespace App\Providers;

use App\Models\Empresa;
use Illuminate\Support\ServiceProvider;
use Spatie\Onboard\OnboardFacade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setEmpresaOnboardSteps();
    }

    protected function setEmpresaOnboardSteps()
    {
        OnboardFacade::addStep('Completar cadastro')
            ->link('/empresas')
            ->cta('Preencher dados cadastro')
            ->completeIf(function (Empresa $empresa) {
                return false;
            });

        OnboardFacade::addStep('Escolher plano')
            ->link('/empresas')
            ->cta('Escolher o plano')
            ->completeIf(function (Empresa $empresa) {
                return false;
            });

        OnboardFacade::addStep('Pagar assinatura')
            ->link('/empresas')
            ->cta('Pagar assinatura')
            ->completeIf(function (Empresa $empresa) {
                return false;
            });

        OnboardFacade::addStep('Configurar integração')
            ->link('/empresas')
            ->cta('Nova integração')
            ->completeIf(function (Empresa $empresa) {
                return $empresa->integracoes()->count();
            });
    }
}
