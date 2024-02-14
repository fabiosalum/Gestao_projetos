<?php

use App\Http\Controllers\AreaconhecimentoController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DisciplinasController;
use App\Http\Controllers\EtapaController;
use App\Http\Controllers\ProcessosController;
use App\Http\Controllers\ProjetosController;
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

Route::get('/', function () {
    return view('admin.dashboard.index');
});


Route::get('/calendario', [CalendarController::class, 'index'])->name('calendar');

Route::get('/cadastros/areaconhecimento', [AreaconhecimentoController::class, 'index'])->name('cadastro.areaconhecimento');
Route::post('/cadastros/areaconhecimento/salvar', [AreaconhecimentoController::class, 'store'])->name('cadastros.areaconhecimento.store');
Route::post('/cadastros/areaconhecimento/editar/{id}', [AreaconhecimentoController::class, 'edit'])->name('cadastros.areaconhecimento.edit');
Route::delete('/cadastros/areaconhecimento/delete/{id}', [AreaconhecimentoController::class, 'destroy'])->name('cadastros.areaconhecimento.delete');
Route::get('/cadastros/areaconhecimento/show/{id}', [AreaconhecimentoController::class, 'show'])->name('cadastros.areaconhecimento.show');

Route::resource('/cadastros/disciplina', DisciplinasController::class);

Route::resource('/projetos', ProjetosController::class);
Route::get('/projetos/show/{id}', [ProjetosController::class, 'detalhes'])->name('projeto.detalhes');
Route::post('/projetos/etapas', [EtapaController::class, 'store'])->name('etapas.store');
Route::get('/projetos/arquivar/{id}', [ProjetosController::class, 'arquivar'])->name('projeto.arquivar');
Route::get('/projetos/arquivos/exibir', [ProjetosController::class, 'arquivoshow'])->name('projetos.arquivo.show');

Route::get('/etapas/show/{id}', [ProcessosController::class, 'etapadetalhes'])->name('etapa.detalhes');
Route::get('/etapas/processos', [ProcessosController::class, 'etapaprocessos'])->name('etapa.processos');
Route::post('/etapas/processos/salvar', [ProcessosController::class, 'store'])->name('processos.store');
Route::get('/changeStatus', [ProcessosController::class, 'changestatus'])->name('processos.changestatus');
Route::get('/processos/excluir/{id}', [ProcessosController::class, 'excluir'])->name('processo.excluir');
