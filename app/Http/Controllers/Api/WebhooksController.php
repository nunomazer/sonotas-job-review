<?php

namespace App\Http\Controllers\Api;

use App\Services\EmpresaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Events\WebhookCheckoutEvent;

class WebhooksController extends Controller
{
    public function sped(Request $request, string $driver)
    {
        Log::debug($driver);
        Log::debug('Webhook', $request->all());
    }
    

    //refatorar
    public function checkout(Request $request, string $driver)
    { 
        Log::debug('Controller driver', [$driver]);
        Log::debug('Webhook checkout', $request->all()); 

        try{
            if($driver == "eduzz"){
                $service = new EmpresaService();
                $service->checarWebhook($request->all());
            }
            return response()->json(['status' => 'OK']);              
        }catch(\Exception $e){
            Log::error($e); 
            return response()->json(['error' => $e->getMessage()], 200);   
        }
    }
}
