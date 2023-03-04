<?php

use App\Http\Controllers\Api\ClientesController;
use App\Http\Controllers\Api\CidadesController;
use App\Http\Controllers\Api\EstadosController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\Api\ServicosController;
use App\Http\Controllers\Api\WebhooksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', [\App\Http\Controllers\Api\Controller::class, 'index']);

Route::prefix('privado')->group(function(){
    Route::get('/clientes/search', [ClientesController::class, 'search'])->name('api.clientes.search');
    Route::get('/cidades/search', [CidadesController::class, 'search'])->name('api.cidades.search');
    Route::get('/servicos/search', [ServicosController::class, 'search'])->name('api.servicos.search');

    Route::get('/empresas/{empresa}/configuracao-nfse', [EmpresasController::class, 'apiGetConfiguracaoNFSe'])->name('api.empresas.configuracao-nfse.get');
});

Route::post('/sped/webhook/{driver}', [WebhooksController::class, 'sped'])->name('api.webhook.sped');
Route::post('/checkout/webhook/{driver}', [WebhooksController::class, 'checkout'])->name('api.webhook.checkout');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/estados', [EstadosController::class, 'index'])->name('api.estados.index');
});

