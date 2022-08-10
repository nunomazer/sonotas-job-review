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

    /**
     * @param Empresa $empresa
     * @param Integracao $integracao
     * @param string $status
     */
    public function __construct(Empresa $empresa, Integracao $integracao, string $status)
    {
        $this->empresa = $empresa;
        $this->integracao = $integracao;
        $this->status = $status;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        //return ['mail'];
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
            'mensagem' => 'Serviços importados',
            'empresa_id' => $this->empresa->id,
            'empresa_nome' => $this->empresa->nome,
            'driver' => $this->integracao->driver,
            'tipo_documento' => $this->integracao->tipo_documento,
            'status' => $this->status,
        ];
    }
}
