<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClientesController;
use App\Http\Controllers\Api\CidadesController;
use App\Http\Controllers\Api\CnaesController;
use App\Http\Controllers\Api\EmpresasController as ApiEmpresasController;
use App\Http\Controllers\Api\EstadosController;
use App\Http\Controllers\Api\RegimesTributariosController;
use App\Http\Controllers\Api\RegimesTributariosEspeciaisController;
use App\Http\Controllers\Api\TiposLogradouroController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\Api\ServicosController;
use App\Http\Controllers\Api\WebhooksController;
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

Route::post('/auth', [AuthController::class, 'login'])->name('api.auth.login');

Route::prefix('privado')->group(function(){
    Route::get('/clientes/search', [ClientesController::class, 'search'])->name('api.clientes.search');
    Route::get('/cidades/search', [CidadesController::class, 'search'])->name('api.cidades.search');
    Route::get('/servicos/search', [ServicosController::class, 'search'])->name('api.servicos.search');

    Route::get('/empresas/{empresa}/configuracao-nfse', [EmpresasController::class, 'apiGetConfiguracaoNFSe'])->name('api.empresas.configuracao-nfse.get');
});

Route::post('/sped/webhook/{driver}', [WebhooksController::class, 'sped'])->name('api.webhook.sped');
Route::post('/checkout/webhook/{driver}', [WebhooksController::class, 'checkout'])->name('api.webhook.checkout');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/empresas/search', [ApiEmpresasController::class, 'search'])->name('api.empresas.search');
    Route::get('/empresas/{id}', [ApiEmpresasController::class, 'getById'])->name('api.empresas.get-by-id');
    Route::post('/empresas', [ApiEmpresasController::class, 'store'])->name('api.empresas.store');

    Route::get('/cnaes', [CnaesController::class, 'index'])->name('api.cnaes.index');
    Route::get('/estados', [EstadosController::class, 'index'])->name('api.estados.index');
    Route::get('/regimes-tributarios', [RegimesTributariosController::class, 'index'])->name('api.regimes-tributarios.index');
    Route::get('/regimes-tributarios-especiais', [RegimesTributariosEspeciaisController::class, 'index'])->name('api.regimes-tributarios-especiais.index');
    Route::get('/tipos-logradouro', [TiposLogradouroController::class, 'index'])->name('api.tipos-logradouro.index');
});

