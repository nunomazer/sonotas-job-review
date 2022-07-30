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

        OnboardFacade::addStep('Adquirir plano')
            ->link('/empresas')
            ->cta('Escolher o plano')
            ->completeIf(function (Empresa $empresa) {
                return false;
            });

        OnboardFacade::addStep('Ativar assinatura')
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

        OnboardFacade::addStep('Importar produtos/serviços')
            ->link('/empresas')
            ->cta('Importar')
            ->completeIf(function (Empresa $empresa) {
                if ($empresa->servicos()->count()) {
                    return $empresa->servicos()->first()->integracoes()->count();
                }

                return false;
            });
    }
}
