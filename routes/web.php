<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaconhecimentoController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DisciplinasController;
use App\Http\Controllers\EtapaController;
use App\Http\Controllers\NotificacaoController;
use App\Http\Controllers\ProcessosController;
use App\Http\Controllers\ProjetosController;
use App\Http\Controllers\UsersController;
use App\Models\Notificacao;
use App\Models\Processos;
use App\Models\Projetos;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('auth.login');
});

//Route::get('/dashboard', [Dashboard::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

 Route::get('/dashboard', function () {

    $userstatus = Auth::user();
    if($userstatus->status == 0){
        return view('admin.dashboard.acesso');
    }else{

        $notificacoes = Notificacao::latest()->paginate(10);
        $users = User::all();
        $proj_andamento = Projetos::where('arquivado', '0')->get();
        $proj_arquivado = Projetos::where('arquivado', '1')->get();
        $processos = Processos::where('status', '0')->get();

         return view('admin.dashboard.index', compact('users', 'proj_andamento', 'proj_arquivado', 'processos', 'notificacoes'));

    }

  })->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {

    //Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//});


Route::middleware('auth')->group(function () {


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/cadastros/areaconhecimento', [AreaconhecimentoController::class, 'index'])->name('cadastro.areaconhecimento');
    Route::get('/cadastros/areaconhecimento/precadastrar', [AreaconhecimentoController::class, 'precadastrar'])->name('areaconhecimento.precadastrar');
    Route::post('/cadastros/areaconhecimento/salvar', [AreaconhecimentoController::class, 'store'])->name('cadastros.areaconhecimento.store');
    Route::post('/cadastros/areaconhecimento/editar/{id}', [AreaconhecimentoController::class, 'edit'])->name('cadastros.areaconhecimento.edit');
    Route::delete('/cadastros/areaconhecimento/delete/{id}', [AreaconhecimentoController::class, 'destroy'])->name('cadastros.areaconhecimento.delete');
    Route::get('/cadastros/areaconhecimento/show/{id}', [AreaconhecimentoController::class, 'show'])->name('cadastros.areaconhecimento.show');

    Route::resource('/cadastros/disciplina', DisciplinasController::class);
    //Route::get('/disciplina/precadastrar', [DisciplinasController::class, 'precadastrar'])->name('disciplina.precadastrar');
    Route::get('/disciplinachangeStatus', [DisciplinasController::class, 'disciplinachangeStatus'])->name('disciplina.changestatus');

    Route::resource('/usuarios', UsersController::class);
    Route::delete('/usuarios/excluir/{$id}', [UsersController::class, 'excluir'])->name('usuarios.excluir');
    Route::get('/userchangeStatus', [UsersController::class, 'userchangestatus'])->name('user.changestatus');

    Route::resource('/projetos', ProjetosController::class);
    Route::get('/projetos/show/{id}', [ProjetosController::class, 'detalhes'])->name('projeto.detalhes');
    Route::post('/projetos/etapas', [EtapaController::class, 'store'])->name('etapas.store');
    Route::get('/projetos/etapas_pre/{id}', [EtapaController::class, 'etapaspre'])->name('etapas.predefinidas');
    Route::post('/projetos/import', [ProjetosController::class, 'uploadExcel'])->name('upload.excel');
    Route::get('/projetos/arquivar/{id}', [ProjetosController::class, 'arquivar'])->name('projeto.arquivar');
    Route::get('/projetos/arquivos/exibir', [ProjetosController::class, 'arquivoshow'])->name('projetos.arquivo.show');

    Route::get('/etapas/show/{id}', [ProcessosController::class, 'etapadetalhes'])->name('etapa.detalhes');
    Route::get('/etapas/todos_processos/{id}', [ProcessosController::class, 'todosprocessos'])->name('todos.processos');
    Route::get('/etapas/processos', [ProcessosController::class, 'etapaprocessos'])->name('etapa.processos');
    Route::post('/etapas/processos/salvar', [ProcessosController::class, 'store'])->name('processos.store');
    Route::get('/changeStatus', [ProcessosController::class, 'changestatus'])->name('processos.changestatus');
    Route::get('/processos/excluir/{id}', [ProcessosController::class, 'excluir'])->name('processo.excluir');
    Route::get('/processos/cadastrar/{etapa_id}', [ProcessosController::class, 'precadastrar'])->name('processo.precadastrar');

    Route::get('/notificacoes', [NotificacaoController::class, 'index'])->name('notificacao.index');
    Route::post('/notificacoes/store', [NotificacaoController::class, 'store'])->name('notificacao.store');



});

require __DIR__.'/auth.php';
