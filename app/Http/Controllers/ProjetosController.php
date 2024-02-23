<?php

namespace App\Http\Controllers;

use App\Imports\EtapasImport;
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


        return view('admin.projetos.index', compact('projeto'));
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

        $validated = $request->validate([
            'nome' => 'required|unique:projetos|max:255',
            'data_entrega' => 'required',
        ]);


        $project = new Projetos();

        $project->nome = $request->nome;
        $project->data_entrega = $request->data_entrega;
        $project->serie = $request->serie;
        $project->volume = $request->volume;

        $project->save();

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
