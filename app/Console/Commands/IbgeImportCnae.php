<?php

namespace App\Console\Commands;

use App\Services\Ibge;
use Illuminate\Console\Command;

class IbgeImportCnae extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ibge:import-cnae';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import CNAE from IBGE';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Importing CNAE...');
        (new Ibge())->importCnae();
        $this->info('Importing CNAE... done!');
    }
}
