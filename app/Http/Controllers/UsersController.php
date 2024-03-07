<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::skip(1)->take(PHP_INT_MAX)->get();

        if(!Gate::allows('acesso-user')){
            return view('admin.usuarios.index', compact('users'));
        }

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
            'email' => 'email|required',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->eh_admin == NULL ){
            $user->eh_admin = '0';
        }else
            $user->eh_admin = '1';



        $user->password = Hash::make($request->password);

        $user->save();

        toastr()->success('Usuário cadastrado com Sucesso');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    public function userchangestatus(Request $request){

        $user = User::find($request->user_id);

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Usuário não encontrado'], 404);
        }

        $user->status = $request->status;
        $user->save();

        return response()->json(['success' => true]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( string $id)
    {


    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = User::find($id);

        if(!$user){
            toastr()->info('Usuário não encontrado');
            return redirect()->back();
        }


        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            // Se o campo de senha foi preenchido, atualize a senha do usuário
            $user->password = Hash::make($request->password);
        }

        $user->eh_admin = $request->has('eh_admin');

        $user->save();


        toastr()->success('Usuário atualizado com Sucesso');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function excluir($id)
    {

        $user = User::find($id);
        if($user->eh_admin == 0){
            $user->delete();
            toastr()->success('Usuário deletado com Sucesso');
            return redirect()->route('usuarios.index');
        }else{
            toastr()->warning('Esse usuário é um Admin e não pode ser deletado');
            return redirect()->route('usuarios.index');
        }

    }


    public function destroy(string $id)
    {
        //
    }
}
