<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IntegracoesController;
use App\Http\Controllers\NFSeController;
use App\Http\Controllers\NotificacoesController;
use App\Http\Controllers\VendasController;
use App\Http\Controllers\ServicosController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/oauth-confirmation', [LoginController::class, 'oauthConfirmation'])->name('oauthConfirmation');
Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/profile/{user}', [UserController::class, 'showProfile'])->name('profile');

    Route::get('/empresas/{empresa}/integracoes/create/choose-platform', [IntegracoesController::class, 'createChoosePlatform'])->name('empresas.integracoes.create.choose-platform');
    Route::get('/empresas/{empresa}/integracoes/create', [IntegracoesController::class, 'create'])->name('empresas.integracoes.create');
    Route::get('/empresas/{empresa}/integracoes/{integracao}/edit', [IntegracoesController::class, 'edit'])->name('empresas.integracoes.edit');
    Route::post('/empresas/{empresa}/integracoes', [IntegracoesController::class, 'store'])->name('empresas.integracoes.store');
    Route::post('/empresas/{empresa}/integracoes/{integracao}/servicos/importar', [IntegracoesController::class, 'importFromPlatform'])->name('empresas.integracoes.servicos.importar');
    Route::put('/empresas/{empresa}/integracoes/{integracao}', [IntegracoesController::class, 'update'])->name('empresas.integracoes.upate');

    Route::get('/empresas/{empresa}/configuracao-nfse/edit', [EmpresasController::class, 'createConfigNFSe'])->name('empresas.nfse.create');
    Route::get('/empresas/{empresa}/configuracao-nfse/{nfseConfig}/edit', [EmpresasController::class, 'editConfigNFSe'])->name('empresas.nfse.edit');
    Route::post('/empresas/{empresa}/configuracao-nfse', [EmpresasController::class, 'storeConfigNFSe'])->name('empresas.nfse.store');
    Route::put('/empresas/{empresa}/configuracao-nfse/{nfseConfig}', [EmpresasController::class, 'updateConfigNFSe'])->name('empresas.nfse.update');

    Route::get('/empresas/{empresa}/assinatura/create', [EmpresasController::class, 'createAssinatura'])->name('empresas.assinatura.create');
    Route::get('/empresas/{empresa}/assinatura/{assinatura}/edit', [EmpresasController::class, 'editAssinatura'])->name('empresas.assinatura.edit');
    Route::post('/empresas/{empresa}/assinatura', [EmpresasController::class, 'storeAssinatura'])->name('empresas.assinatura.store');
    Route::put('/empresas/{empresa}/assinatura/{assinatura}', [EmpresasController::class, 'updateAssinatura'])->name('empresas.assinatura.update');

    Route::get('/empresas', [EmpresasController::class, 'index'])->name('empresas.list');
    Route::get('/empresas/create', [EmpresasController::class, 'create'])->name('empresas.create');
    Route::post('/empresas', [EmpresasController::class, 'store'])->name('empresas.store');
    Route::get('/empresas/{empresa}/edit', [EmpresasController::class, 'edit'])->name('empresas.edit');
    Route::put('/empresas/{empresa}', [EmpresasController::class, 'update'])->name('empresas.update');

    Route::get('/vendas', [VendasController::class, 'index'])->name('vendas.list');
    Route::get('/vendas/create', [VendasController::class, 'create'])->name('vendas.create');
    Route::post('/vendas', [VendasController::class, 'store'])->name('vendas.store');
    Route::post('/vendas/{venda}/emitir-nf', [VendasController::class, 'emitirNF'])->name('vendas.nf.emitir');
    Route::get('/vendas/{venda}/edit', [VendasController::class, 'edit'])->name('vendas.edit');
    Route::put('/vendas/{venda}', [VendasController::class, 'update'])->name('vendas.update');

    Route::get('/notas-servico', [NFSeController::class, 'index'])->name('notas-servico.list');
    Route::get('/notas-servico/{nfse}', [NFSeController::class, 'show'])->name('notas-servico.show');
    Route::get('/notas-servico/{nfse}/download-pdf', [NFSeController::class, 'downloadPdf'])->name('notas-servico.download.pdf');
    Route::get('/notas-servico/{nfse}/download-xml', [NFSeController::class, 'downloadXml'])->name('notas-servico.download.xml');

    Route::get('/servicos', [ServicosController::class, 'index'])->name('servicos.list');
    Route::get('/servicos/create', [ServicosController::class, 'create'])->name('servicos.create');
    Route::post('/servicos', [ServicosController::class, 'store'])->name('servicos.store');
    Route::get('/servicos/{servico}/edit', [ServicosController::class, 'edit'])->name('servicos.edit');
    Route::put('/servicos/{servico}', [ServicosController::class, 'update'])->name('servicos.update');

    Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes.list');
    Route::get('/clientes/create', [ClientesController::class, 'create'])->name('clientes.create');
    Route::post('/clientes', [ClientesController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/{cliente}/edit', [ClientesController::class, 'edit'])->name('clientes.edit');
    Route::put('/clientes/{cliente}', [ClientesController::class, 'update'])->name('clientes.update');

    Route::get('/notificacoes', [NotificacoesController::class, 'index'])->name('notificacoes.list');
    Route::get('/notificacoes/{notification}/mark-as-read', [NotificacoesController::class, 'markAsRead'])->name('notificacoes.marcar-como-lida');
});

