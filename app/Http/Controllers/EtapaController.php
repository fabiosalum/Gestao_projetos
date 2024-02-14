<?php

namespace App\Http\Controllers;

use App\Models\Etapas;
use Illuminate\Http\Request;
use App\Models\Projetos;

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
}
