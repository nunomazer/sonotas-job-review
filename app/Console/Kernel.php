<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('sync:vendas-plataformas')->hourly();

        $schedule->command('vendas:gerar-nf-planejadas')->hourlyAt(15);

        //$schedule->command('sped:atualizar-status-docs')->dailyAt('01:00');
        $schedule->command('sped:atualizar-status-docs')->hourlyAt(30);
        $schedule->command('sped:atualizar-status-cancelamentos-nfse')->everyFiveMinutes(); //validar tempo
        $schedule->command('sped:download-xml-pdf-docs')->hourlyAt(45);
        $schedule->command('sped:emitir-nf-pendentes')->everySixHours();

        $schedule->command('ibge:import-states-cities')->monthly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
