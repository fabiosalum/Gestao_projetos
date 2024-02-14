<?php

namespace App\Http\Controllers;

use App\Models\Disciplinas;
use App\Models\Etapas;
use App\Models\Processos;
use App\Models\Projetos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Process;

class ProcessosController extends Controller
{
    public function etapadetalhes($id){

        $etapa = Etapas::find($id);
        $todos_processos = Processos::where('projeto_id', $etapa->projeto_id)->get();
        $processos = Processos::where('etapa_id', $id)->latest()->get();
        $disciplinas = Disciplinas::orderBy('nome', 'asc')->get();
        $todas_etapas = Etapas::where('projeto_id', $etapa->projeto_id)->get();
        $status = Processos::where('projeto_id', $id)->get();
        return view('admin.processos.processos', compact('etapa', 'disciplinas', 'processos', 'todas_etapas', 'status','todos_processos'));

    }

    public function store(Request $request){


        $processo = new Processos();

        $processo->etapa_id = $request->etapa_id;
        $processo->projeto_id = $request->projeto_id;
        $processo->codigo_id = $request->codigo_id;
        $processo->data_entrega = $request->data_entrega;
        $processo->disciplina_id = $request->disciplina;
        $processo->autor = $request->nome_resp;
        $processo->data_entrega_autor = $request->data_entrega_autor;
        $processo->simulado = $request->simulado;
        $processo->imagem = $request->imagem;
        $processo->manual = $request->manual;
        $processo->status = 0;

        $processo->save();

        toastr()->success('Cadastrado com Sucesso');
        return redirect()->back();


    }

    public function changestatus(Request $request){

        $processoStatus = Processos::find($request->processo_id);
        $processoStatus->status = $request->status;
        $processoStatus->save();


    }

    public function excluir($id){


        $processo = Processos::find($id);
        $processo->delete();

        toastr()->success('Deletado com Sucesso');
        return redirect()->back();




    }
}
