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

Route::get('/clientes/search', [ClientesController::class, 'search'])->name('api.clientes.search');
Route::get('/cidades/search', [CidadesController::class, 'search'])->name('api.cidades.search');
Route::get('/servicos/search', [ServicosController::class, 'search'])->name('api.servicos.search');

Route::post('/sped/webhook/{driver}', [WebhooksController::class, 'sped'])->name('api.webhook.sped');

Route::post('/checkout/webhook/{driver}', [WebhooksController::class, 'checkout'])->name('api.webhook.checkout');

Route::get('/empresas/{empresa}/configuracao-nfse', [EmpresasController::class, 'apiGetConfiguracaoNFSe'])->name('api.empresas.configuracao-nfse.get');


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/estados', [EstadosController::class, 'index'])->name('api.estados.index');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
