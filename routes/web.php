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

Route::get('/empresas/{empresa}/integracoes/{integracao}', [IntegracoesController::class, 'edit'])->name('empresas.integracoes.edit');

Route::get('/empresas', [EmpresasController::class, 'index'])->name('empresas.list');

