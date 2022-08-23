<?php

use App\Http\Controllers\Api\ClientesController;
use App\Http\Controllers\Api\ServicosController;
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
Route::get('/servicos/search', [ServicosController::class, 'search'])->name('api.servicos.search');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
