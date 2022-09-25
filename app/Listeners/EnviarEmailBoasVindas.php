<?php

namespace App\Listeners;

use App\Events\WebhookCheckoutEvent;
use App\Services\EmpresaService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Registered;
use App\Mail\WelcomeMail; 
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EnviarEmailBoasVindas implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        Log::info("EnviarEmailBoasVindas {$event->user->email}");
        try{
            Mail::to($event->user->email)->send(new WelcomeMail($event->user));
        }catch(\Exception $e){
            Log::error($e);
        }
    }
}
