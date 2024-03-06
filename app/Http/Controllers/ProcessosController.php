<?php

namespace App\Http\Controllers;

use App\Models\Disciplinas;
use App\Models\Etapas;
use App\Models\Processos;
use App\Models\Projetos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Process;
use Carbon\Carbon;

class ProcessosController extends Controller
{
    public function etapadetalhes($id, $projeto_id){

        $etapa = Etapas::find($id);
        $projeto = Projetos::findOrFail($projeto_id);
        $todos_processos = Processos::where('projeto_id', $etapa->projeto_id)->get();
        $processos = Processos::where('etapa_id', $id)->latest()->get();
        //$disciplinas = Disciplinas::where('status', '1')->orderBy('nome', 'asc')->get();
        $disciplinas = $projeto->disciplinas()->where('status', '1')->orderBy('nome', 'asc')->get();
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
        $processo->data_inicio = $request->data_inicio;
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

        return response()->json(['success' => true]);

    }

    public function precadastrar($etapa_id, $projeto_id ){

        //$disciplinas = Disciplinas::where('status', '1')->get();

        $projeto = Projetos::findOrFail($projeto_id);
        $disciplinas = $projeto->disciplinas()->where('status', '1')->orderBy('nome', 'asc')->get();
        $etapa = Etapas::find($etapa_id);

        foreach($disciplinas as $discip){

            $processo = new Processos();
            $processo->projeto_id = $etapa->projeto_id;
            $processo->etapa_id = $etapa_id;
            $processo->data_entrega = $etapa->data_entrega;
            $processo->disciplina_id = $discip->id;
            $processo->data_inicio = Carbon::today();
            $processo->data_entrega_autor = Carbon::today()->addDays(45);
            $processo->status = 0;
            $processo->simulado = 0;
            $processo->imagem = 0;
            $processo->manual = 0;
            $processo->save();

        }


        toastr()->success('Processos criados com sucesso');
        return redirect()->back();
    }


    public function excluir($id){


        $processo = Processos::find($id);
        $processo->delete();

        toastr()->success('Deletado com Sucesso');
        return redirect()->back();
    }

    public function update(Request $request, $id){


        $processo = Processos::find($id);

        $processo->codigo_id = $request->codigo_id;
        $processo->data_entrega = $request->data_entrega;
        $processo->data_inicio = $request->data_inicio;
        $processo->disciplina_id = $request->disciplina;
        $processo->autor = $request->nome_resp;
        $processo->data_entrega_autor = $request->data_entrega_autor;
        $processo->simulado = $request->simulado;
        $processo->imagem = $request->imagem;
        $processo->manual = $request->manual;
        $processo->status = 0;

        $processo->save();

        toastr()->success('Atualizado com Sucesso');
        return redirect()->back();




    }




}
