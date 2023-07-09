<?php

namespace App\Notifications;

use App\Models\Empresa;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Notificacao extends Notification implements ShouldQueue
{
    use Queueable;

    public Empresa $empresa;
    public string $status;
    public string $mensagem;

    /**
     * @param Empresa $empresa
     * @param Integracao $integracao
     * @param string $status
     * @param string $mensagem
     */
    public function __construct(Empresa $empresa, string $status, string $mensagem)
    {
        $this->empresa = $empresa;
        $this->status = $status;
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
            'mensagem' => $this->mensagem,
            'empresa_id' => $this->empresa->id,
            'empresa_nome' => $this->empresa->nome,
            'status' => $this->status,
        ];
    }
}
