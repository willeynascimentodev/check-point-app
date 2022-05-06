<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cpf;

class UserController extends Controller
{

    public function login() {
        return view('auth.login');
    }

    public function auth() {
        dd('Auth');
    }

    public function cadastro() {
        return view('auth.cadastro');
    }

    public function cadastrar(Request $req) {
        $dados = $req->all();
        
        $cpf = $req->cpf;
        $cpfObj = new Cpf();
        dd($cpfObj->validarCpf($cpf));

    }

}
