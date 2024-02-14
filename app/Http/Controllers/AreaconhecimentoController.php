<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Areaconhecimento;

class AreaconhecimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $a_conhecimento = Areaconhecimento::all();
        return view ('admin.cadastros.areaconhecimento', compact('a_conhecimento'));
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
        $a_conhecimento = new Areaconhecimento();

        $a_conhecimento->nome = $request->nome;
        $a_conhecimento->save();

        toastr()->success('Cadastrada com Sucesso');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $conhecimento = Areaconhecimento::find($id);
        return view('admin.cadastros.areacon_delete', compact('conhecimento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {


        $a_conhecimento = Areaconhecimento::find($id);

        $a_conhecimento->nome = $request->nome;
        $a_conhecimento->save();

        toastr()->success('Alterado com Sucesso');
        return redirect()->back();




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
        $conhecimento = Areaconhecimento::find($id);
        $conhecimento->delete();
        toastr()->success('Deletado com Sucesso');
        return redirect(route('cadastro.areaconhecimento'));
    }
}
