<?php

namespace App\Jobs;

use App\Exceptions\ServicoNaoSincronizadoException;
use App\Models\Empresa;
use App\Models\Integracao;
use App\Notifications\ServicosImportados;
use App\Services\ServicoService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class IntegracaoImportarServicos implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Empresa $empresa;
    public Integracao $integracao;

    /**
     * @param Empresa $empresa
     * @param Integracao $integracao
     */
    public function __construct(Empresa $empresa, Integracao $integracao)
    {
        $this->empresa = $empresa;
        $this->integracao = $integracao;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $servicoService = new ServicoService();
        try {
            $result = $servicoService->syncFromPlatform($this->empresa, $this->integracao->driver);

            $this->empresa->owner->notify(new ServicosImportados($this->empresa, $this->integracao, 'success', count($result)));
        } catch (\Exception $exception) {
            Log::error($exception);

            $this->empresa->owner->notify(new ServicosImportados($this->empresa, $this->integracao, 'error', 0));
        }
    }
}
