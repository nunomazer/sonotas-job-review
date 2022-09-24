<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $data;
    
    public function __construct($data){
        $this->data = $data;
    }
    
    public function build()
    {
        $address = config('MAIL_FROM_ADDRESS');
        $subject = 'Seja bem vindo ao Só Notas!';
        $name = config('MAIL_FROM_NAME');
        
        return $this->view('mails.welcome')
                    ->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->with([ 'message' => $this->data['message'] ]);    
      }
}