<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $data;
    
    public function __construct($data){
        $this->data = $data;
    }
    
    public function build()
    {
        $address = env('MAIL_FROM_ADDRESS', 'noreply@sonotas.com.br');
        $subject = 'Seja bem vindo ao Só Notas!';
        $name = env('MAIL_FROM_NAME', 'SóNotas');
        
        Log::info($name); 
        Log::info($address); 
        Log::info($this->data); 
        return $this->view('mails.welcome')
                    ->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->with([ 'message' => '']);    
      }
}