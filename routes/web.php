<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']);
Route::get('/painel', [EventController::class, 'painel'])->middleware('auth');

//Rotas pagina marcas
Route::get('/painel/marcas/{url}/{id?}', [EventController::class, 'marcas_result'])->middleware('auth');
Route::post('/painel/marcas/cadastrar', [EventController::class, 'marcas_cadastrar'])->middleware('auth');
Route::put('/painel/marcas/put/{id}', [EventController::class, 'marcas_put'])->middleware('auth');
Route::delete('/painel/marcas/deletar/{id}', [EventController::class, 'marcas_delete'])->middleware('auth');

//Rotas pagina modelos
Route::get('/painel/modelos/{url}/{id?}', [EventController::class, 'modelos_result'])->middleware('auth');
Route::post('/painel/modelos/cadastrar', [EventController::class, 'modelos_cadastrar'])->middleware('auth');
Route::put('/painel/modelos/put/{id}', [EventController::class, 'modelos_put'])->middleware('auth');
Route::delete('/painel/modelos/deletar/{id}', [EventController::class, 'modelos_delete'])->middleware('auth');

//Rotas pagina veiculos
Route::get('/painel/veiculos/{url}/{id?}', [EventController::class, 'veiculos_result'])->middleware('auth');
Route::post('/painel/veiculos/cadastrar', [EventController::class, 'veiculos_cadastrar'])->middleware('auth');
Route::put('/painel/veiculos/put/{id}', [EventController::class, 'veiculos_put'])->middleware('auth');
Route::delete('/painel/veiculos/deletar/{id}', [EventController::class, 'veiculos_delete'])->middleware('auth');

//Rota ajax
Route::get('/painel/ajax/{data}', [EventController::class, 'ajax']);