<?php

namespace App\Http\Controllers;

use App\Imports\EtapasImport;
use App\Models\Disciplinas;
use Illuminate\Http\Request;
use App\Models\Projetos;
use App\Models\Etapas;
use Maatwebsite\Excel\Facades\Excel;

class ProjetosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projeto = Projetos::where('arquivado', 0)->orderBy('id')->get();
        $disciplinas = Disciplinas::all();

        return view('admin.projetos.index', compact('projeto', 'disciplinas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //dd($request->disciplina);
        $validated = $request->validate([
            'nome' => 'required|unique:projetos|max:255',
            'data_entrega' => 'required',
            'disciplina' => 'required'
        ]);


        // Criar o projeto
        $project = Projetos::create([
            'nome' => $request->nome,
            'data_entrega' => $request->data_entrega,
            'serie' => $request->serie,
            'volume' => $request->volume,
        ]);

        // Obter o ID do projeto recém-criado
        $projectId = $project->id;

        // Sincronizar as disciplinas com o projeto
        $project->disciplinas()->sync($request->disciplina);

        toastr()->success('Projeto cadastrado com Sucesso');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function detalhes(string $id)
    {

        $projeto = Projetos::find($id);
        $etapas = Etapas::where('projeto_id', $id)->get();
        return view ('admin.projetos.etapas', compact('projeto', 'etapas'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        //
    }

    public function arquivar($id){

        $projeto = Projetos::find($id);

        if($projeto->arquivado == 0){

            $projeto->arquivado = 1;
        };


        $projeto->save();
        toastr()->success('Projeto arquivado com Sucesso');
        return redirect()->back();


    }

    public function arquivoshow(){

        $projetos = Projetos::where('arquivado', 1)->latest()->get();

        return view('admin.arquivados.index', compact('projetos'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }




}
