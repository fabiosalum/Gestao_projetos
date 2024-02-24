<?php

namespace App\Http\Controllers;

use App\Models\Areaconhecimento;
use App\Models\Disciplinas;
use Illuminate\Http\Request;

class DisciplinasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $disciplinas = Disciplinas::all();

        return view ('admin.cadastros.disciplinas', compact('disciplinas'));
    }


    public function disciplinachangeStatus(Request $request){

        $disciplina = Disciplinas::find($request->disciplina_id);

        if (!$disciplina) {
            return response()->json(['success' => false, 'message' => 'Usuário não encontrado'], 404);
        }

        $disciplina->status = $request->status;
        $disciplina->save();

        return response()->json(['success' => true]);

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

        $request->validate([
            'nome' => 'required',
        ]);

        //dd($request);
        $disciplina = new Disciplinas();

        $disciplina->nome = $request->disciplina;
        $disciplina->save();

        toastr()->success('Cadastrado com Sucesso');
        return redirect()->back();


    }



    public function precadastrar()
    {


        $nomes_discip = [
            'Arte',
            'Biologia',
            'Educação Física',
            'Filosofia',
            'Física',
            'Geografia',
            'História',
            'Interpretação de texto',
            'Língua Inglesa',
            'Língua Portuguesa',
            'Matemática',
            'Projeto de Vida',
            'Química',
            'Redação',
            'Sociologia'
        ];

        foreach($nomes_discip as $nd){

            $discip = new Disciplinas();
            $discip->nome = $nd;
            $discip->save();
        }

        toastr()->success('cadastradas com Sucesso');
        return redirect()->route('disciplina.index');


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
