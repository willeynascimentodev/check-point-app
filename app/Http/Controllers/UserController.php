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

    public function auth(Request $req) {
        return $this->redirecionarLogin($this->efetuarLogin($req));
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
        
        $dados = $req->all();
        $dados['cargo'] = "Gestor";
        $dados['nivel'] = 2;
        $dados['password'] = Hash::make($dados['password']);
        User::create($dados);

        return $this->redirecionarLogin($this->efetuarLogin($req));

    }

    public function efetuarLogin ($req) {
    
        if(Auth::attempt([
            'email' => $req->email, 
            'password' => $req->password,  
        ])) {
            return true;    
        } 
        return false;
    }

    public function redirecionarLogin($resposta){
        
        if ($resposta && Auth::user()->nivel == 2) {
            return redirect()->route('gestor.home');
        } else if ($resposta && Auth::user()->nivel == 1) {
            return redirect()->route('funcionario.home');
        }
        return redirect()->route('login')->with('status', 'Dados incorretos.');
    }

    public function editarSenha(){
        return view('senha');
    }

    public function alterarSenha(Request $req) {
        $req->validate([
            'password_confirmation' => 'min:6',
            'password' => 'confirmed|min:6',
        ], [
            'password.confirmed' => 'Senhas não conferem.',
        ]);

        $dados['password'] = Hash::make($req->password);
        
        $user = User::find(Auth::user()->id);
        $user->update($dados);

        return redirect()->back()->with('status', 'Alterado com sucesso.');
    }


    public function editarPerfil(){
        $user = User::find(Auth::user()->id);
        return view('perfil', compact('user'));
    }

    public function alterarRegistro(Request $req) {
        
        $req->validate([
            'cpf' => 'required|validar_cpf|unique:users,cpf,'.Auth::user()->id,
            'email' => 'required|unique:users,email,'.Auth::user()->id,
        ], [
            'cpf.unique' => 'CPF já cadastrado.',
            'cpf.validar_cpf' => 'CPF Inválido.',
            'email.unique' => 'Email já cadastrado.',
        ]);

        $user = User::find(Auth::user()->id);
        $user->update($req->all());

        return redirect()->back()->with('status', 'Alterado com sucesso.');
    }

    public function sair(){
        Auth::logout();
        return redirect()->route('login');
    }

}
