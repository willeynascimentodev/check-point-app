<?php

namespace App\Http\Controllers\Funcionario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ponto;
use App\Models\Funcionario;
use Auth;
use Hash;

class UserController extends Controller
{
    public function home() {
        $ponto = new Ponto();

        $ultimoPonto = $ponto->ultimaEntrada();
        return view('funcionario.home', compact('ultimoPonto'));
    }
    
    public function index(Request $req) {   
        
        if (isset($req->pesquisa)) {
            $funcionarios = Funcionario::join('users', 'users.id', 'funcionarios.user_id')
            ->where('funcionarios.user_gestor_id', Auth::user()->id)
            ->where('users.nome', 'like', $req->pesquisa."%")
            ->paginate(10); 
            $dataForm = $req->all();
            return view('gestor.funcionario.listar', compact('funcionarios', 'dataForm'));
        } else {
            $funcionarios = Funcionario::where('user_gestor_id', Auth::user()->id)->paginate(10);    
            return view('gestor.funcionario.listar', compact('funcionarios'));
        }
        
    }

    public function create() {
        return view('gestor.funcionario.criar');
    }

    public function store(Request $req) {
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

        $dados = $req->except('_token');
        $dados['nivel'] = 1;
        $dados['user_gestor_id'] = Auth::user()->id;
        $dados['password'] = Hash::make($dados['password']);
        $user = User::Create($dados);
        $user->funcionario()->create(['user_gestor_id' => $dados['user_gestor_id']]);
        return redirect()->route('funcionarios.index')->with('status', 'Funcionário adicionado.');
    }

    public function edit($f) {
        $user = User::find($f);
        return view('gestor.funcionario.editar', compact('user'));
    }   

    public function update(Request $req) {
        
        $req->validate([
            'cpf' => 'required|validar_cpf|unique:users,cpf,'.$req->user_id,
            'email' => 'required|unique:users,email,'.$req->user_id,
        ], [
            'email.unique' => 'E-mail já cadastrado.',
            'cpf.unique' => 'CPF já cadastrado.',
            'cpf.validar_cpf' => 'CPF Inválido.',
        ]);

        $user = User::find($req->user_id);
        $user->update($req->all());

        return redirect()->route('funcionarios.index')->with('status', 'Funcionário atualizado.');
    }

    public function destroy($id) {
        $funcionario = Funcionario::find($id);
        $funcionario->user()->delete();
        $funcionario->delete();
        return redirect()->route('funcionarios.index')->with('status', 'Funcionário excluído.');
    }

    public function indexTrash(Request $req) {   
        
        if (isset($req->pesquisa)) {
            $funcionarios = Funcionario::onlyTrashed()->join('users', 'users.id', 'funcionarios.user_id')
            ->where('funcionarios.user_gestor_id', Auth::user()->id)
            ->where('users.nome', 'like', $req->pesquisa."%")
            ->paginate(10); 
            $dataForm = $req->all();
            return view('gestor.funcionario.listar-trash', compact('funcionarios', 'dataForm'));
        } else {
            $funcionarios = Funcionario::onlyTrashed()->where('user_gestor_id', Auth::user()->id)->paginate(10);    
            return view('gestor.funcionario.listar-trash', compact('funcionarios'));
        }

    }

    public function forceDestroy($id) {
        $funcionario = Funcionario::onlyTrashed()->where('id', $id)->first();
        $funcionario->userTrashed()->forceDelete();
        $funcionario->forceDelete();
        return redirect()->back()->with('status', 'Funcionário excluído permanentemente.');
    }

    public function restoreTrashed($id) {
        $funcionario = Funcionario::onlyTrashed()->where('id', $id)->first();
        $funcionario->userTrashed()->restore();
        $funcionario->restore();
        return redirect()->back()->with('status', 'Funcionário restaurado.');
    }

}