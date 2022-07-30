<?php

use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IntegracoesController;
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

Route::get('/empresas', [EmpresasController::class, 'index'])->name('empresas.list');
Route::get('/empresas/{empresa}/edit', [EmpresasController::class, 'edit'])->name('empresas.edit');
Route::put('/empresas/{empresa}', [EmpresasController::class, 'update'])->name('empresas.update');

