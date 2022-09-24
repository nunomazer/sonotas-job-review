<?php

namespace App\Console\Commands;

use App\Mail\NfPdfXmlClienteMail;
use App\Models\Venda;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TesteEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'teste:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia um email de teste';

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
        $venda = Venda::find(12);

        Mail::to($venda->cliente->email)->send(new NfPdfXmlClienteMail($venda));

        Mail::to('sonotas@sonotas.com.br')
            ->send(new \App\Mail\TesteEmail());
    }
}
