<?php

use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IntegracoesController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/profile/{user}', [UserController::class, 'showProfile'])->name('profile');

Route::get('/empresas/{empresa}/integracoes/{integracao}/edit', [IntegracoesController::class, 'edit'])->name('empresas.integracoes.edit');
Route::post('/empresas/{empresa}/integracoes', [IntegracoesController::class, 'store'])->name('empresas.integracoes.store');
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
Route::get('/empresas/{empresa}/edit', [EmpresasController::class, 'edit'])->name('empresas.edit');
Route::put('/empresas/{empresa}', [EmpresasController::class, 'update'])->name('empresas.update');

Route::get('/servicos', [ServicosController::class, 'index'])->name('servicos.list');
