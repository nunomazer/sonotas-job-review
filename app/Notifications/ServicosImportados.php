<?php

namespace App\Notifications;

use App\Models\Empresa;
use App\Models\Integracao;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ServicosImportados extends Notification implements ShouldQueue
{
    use Queueable;

    public Empresa $empresa;
    public Integracao $integracao;
    public string $status;
    public int $qtde;
    public string $mensagem;

    /**
     * @param Empresa $empresa
     * @param Integracao $integracao
     * @param string $status
     * @param int $qtde Quantidade de serviços importados ou atualizados
     */
    public function __construct(Empresa $empresa, Integracao $integracao, string $status, int $qtde, string $mensagem = '')
    {
        $this->empresa = $empresa;
        $this->integracao = $integracao;
        $this->status = $status;
        $this->qtde = $qtde;
        $this->mensagem = $mensagem;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        if($this->empresa->receber_notificacao_por_email){
            return ['database', 'mail'];
        }
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'mensagem' => $this->mensagem . ' - ' . $this->qtde . ' serviço(s) atualizados ou criados na sincronização com ' . $this->integracao->driver,
            'empresa_id' => $this->empresa->id,
            'empresa_nome' => $this->empresa->nome,
            'driver' => $this->integracao->driver,
            'tipo_documento' => $this->integracao->tipo_documento,
            'status' => $this->status,
        ];
    }
}
