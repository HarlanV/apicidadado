<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadaoController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\EnderecoController;
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

Route::middleware('api')->group(function ($router) {
    Route::post('/', [CidadaoController::class, 'store'])->name('store');
    Route::get('/', [CidadaoController::class, 'index'])->name('index');
    Route::get('{cpf}', [CidadaoController::class, 'show'])->name('show');
    Route::put('{cpf}', [CidadaoController::class, 'update'])->name('update');
    Route::delete('{cpf}', [CidadaoController::class, 'delete'])->name('delete');
    Route::get('{cpf}/endereco', [EnderecoController::class, 'show'])->name('endereco.show');
    Route::get('{cpf}/contato', [ContatoController::class, 'show'])->name('contato.show');
    Route::put('{cpf}/endereco', [EnderecoController::class, 'update'])->name('endereco.update');
    Route::put('{cpf}/contato', [ContatoController::class, 'update'])->name('contato.update');
    Route::get('/teste', [CidadaoController::class, 'teste'])->name('teste');
});
