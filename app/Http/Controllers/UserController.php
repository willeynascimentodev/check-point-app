<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utils\Cpf;
use App\Models\User;
use Auth;
use Hash;

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

        $req->validate([
            'password_confirmation' => 'required|min:6',
            'password' => 'required|confirmed|min:6',
            'cpf' => 'required|validar_cpf|unique:users',
            'email' => 'required|unique:users',
        ], [
            'password.confirmed' => 'Senhas não conferem.',
            'email.unique' => 'E-mail já cadastrado.',
            'cpf.unique' => 'CPF já cadastrado.',
            'cpf.validar_cpf' => 'CPF Inválido.',
        ]);

        
        // $cpf = $req->cpf;
        // $cpfObj = new Cpf();
        
        // if (!$cpfObj->validarCpf($cpf)) {
        //     return redirect()->back()->withErrors('cpf', 'CPF Inválido.');
        // }
        
        $dados = $req->all();
        $dados['cargo'] = "Gestor";
        $dados['nivel'] = 2;
        $dados['password'] = Hash::make($dados['password']);
        User::create($dados);

        $this->efetuarLogin($req);

    }

    public function efetuarLogin ($req) {
    
        if(Auth::attempt([
            'email' => $req->email, 
            'password' => $req->password,  
        ])) {
            $req->session()->regenerate();
        }
        dd(Auth::user());
    }

}
