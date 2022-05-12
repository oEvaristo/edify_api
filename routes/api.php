<?php

use App\Http\Controllers\CotacaoController;
use App\Http\Controllers\EdifyLivrosController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/gravalivro', [EdifyLivrosController::class, 'gravaLivros']);
Route::get('/listalivro', [EdifyLivrosController::class, 'listaLivros']);
