<?php

namespace App\Notifications;

use App\Models\Empresa;
use App\Models\Integracao;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ErroAoSincronizarVendasEmpresa extends Notification implements ShouldQueue
{
    use Queueable;

    public Empresa $empresa;
    public string $driverName;
    public string $mensagem;

    /**
     * @param Empresa $empresa
     * @param string $driverName
     * @param string $status
     * @param int $qtde Quantidade de serviços importados ou atualizados
     */
    public function __construct(Empresa $empresa, string $driverName, string $mensagem)
    {
        $this->empresa = $empresa;
        $this->driverName = $driverName;
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
            'driver' => $this->driverName,
            'status' => 'error',
        ];
    }
}
