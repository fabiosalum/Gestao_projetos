<?php

namespace App\Http\Controllers;

use App\Models\Etapas;
use App\Models\Notificacao;
use App\Models\Projetos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificacaoController extends Controller
{
    public function index(){

        $projetos = Projetos::where('arquivado', '0')->get();

        return view('admin.notificacao.index', compact('projetos'));

    }

    public function store(Request $request){

        $validated = $request->validate([
            'msg' => 'required',

        ]);

        $notificacao = new Notificacao();

        $notificacao->user_id = Auth::id();
        $notificacao->projeto_id = $request->projeto_id;
        $notificacao->msg = $request->msg;
        $notificacao->tag = $request->tag;
        $notificacao->data_msg = Carbon::today();

        $notificacao->save();

        toastr()->success('Notificação Enviada com Sucesso');
        return redirect()->route('dashboard');





    }
}
