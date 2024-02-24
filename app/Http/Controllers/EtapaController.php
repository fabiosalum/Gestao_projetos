<?php

namespace App\Http\Controllers;

use App\Models\Etapas;
use Illuminate\Http\Request;
use App\Models\Projetos;
use Carbon\Carbon;

class EtapaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

        //dd($request);
        $request->validate([
            'name' => 'required',
            'data_entrega' => 'required',
            'data_inicio' => 'required',
        ]);

        $etapa = new Etapas();

        $etapa->projeto_id = $request->projeto_id;
        $etapa->nome = $request->nome;
        $etapa->data_entrega = $request->data_entrega;
        $etapa->data_inicio = $request->data_inicio;

        $etapa->save();

        toastr()->success('Etapa cadastrada com Sucesso');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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

    public function etapaspre($id){

        $projeto = Projetos::find($id);

        $nomesetapa = [
            'Entrega do autor',
            'Revisão conceitual',
            'Validação do autor',
            'Ajustes da validação do autor',
            '1ª Revisão textual',
            'Ilustrações',
            'Validação 1ª revisão textual',
            '2ª revisão textual',
            'Ajustes da 2ª revisão textual',
            'Ajuste textual',
            'Diagramação',
            'Revisão de diagramação',
            'Ajustes da revisão de diagramação',
            'Check conceitual',
            'Ajustes do check conceitual',
            'Validação dos ajustes do check conceitual',
            'Ajuste final',
            'Pré-impressão',

        ];

        foreach ($nomesetapa as $nome) {
            $etapa = new Etapas();
            $etapa->projeto_id = $projeto->id;
            $etapa->nome = $nome;
            $etapa->data_inicio = Carbon::today();
            $etapa->data_entrega = Carbon::today()->addDays(60);
            $etapa->save();
        }


        toastr()->success('Etapas cadastradas com Sucesso');
        return redirect()->route('projetos.index');

    }



}
