<?php

namespace App\Mail;

use App\Models\Venda;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NfPdfXmlClienteMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected Venda $venda;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Venda $venda)
    {
        $this->venda = $venda;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $nf = $this->venda->documento_fiscal();
        return $this->view('mails.pdf-xml-nf-cliente')
            ->with([
                'venda' => $this->venda
            ])
            ->attachFromStorageDisk($nf->disk, $nf->arquivo_pdf)
            ->attachFromStorageDisk($nf->disk, $nf->arquivo_xml);
    }
}
