<?php

namespace App\Http\Controllers;

use App\Models\Projetos;
use App\Models\User;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index(){

        $users = User::all();
        $projetos = Projetos::all();
        return view('admin.dashboard.index', compact('users', 'projetos'));

    }
}
