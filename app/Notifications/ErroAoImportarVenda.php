<?php

namespace App\Notifications;

use App\Models\Empresa;
use App\Models\Integracao;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ErroAoImportarVenda extends Notification implements ShouldQueue
{
    use Queueable;

    public Empresa $empresa;
    public string $driverName;
    public string $mensagem;
    public array $vendaApi;

    /**
     * @param Empresa $empresa
     * @param string $driverName
     * @param array $vendaApi Venda lida da plataforma
     * @param string $status
     * @param int $qtde Quantidade de serviços importados ou atualizados
     */
    public function __construct(Empresa $empresa, string $driverName, array $vendaApi, string $mensagem)
    {
        $this->empresa = $empresa;
        $this->driverName = $driverName;
        $this->vendaApi = $vendaApi;
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
            $this->driverName.'_venda_id' => $this->vendaApi['driver_id'],
            $this->driverName.'_venda_id' => $this->vendaApi['driver_id'],
            $this->driverName.'_venda_valor' => $this->vendaApi['venda']['valor'],
            $this->driverName.'_cliente_nome' => $this->vendaApi['cliente']['nome'] ?? '',
            $this->driverName.'_cliente_documento' => $this->vendaApi['cliente']['documento'] ?? '',
            'status' => 'error',
        ];
    }
}
