<?php

namespace App\Http\Controllers\Funcionario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ponto;
use App\Models\User;
use Auth;

class PontoController extends Controller
{
    public function store(Request $req) {
        $ponto = new Ponto();
        $ultimoPonto = $ponto->ultimaEntrada()->tipo;

        $funcionario = User::find(Auth::user()->id)->funcionario;

        if(strcmp($ultimoPonto, 'entrada') == 0) {
            $dados['tipo'] = 'saida';
        } else if(strcmp($ultimoPonto, 'saida') == 0 || $ultimoPonto === null) {
            $dados['tipo'] = 'entrada';
        }
        
        $funcionario->pontos()->create($dados);

        return redirect()->route('funcionario.home')->with('status', 'Ponto registrado com sucesso.');

    }
}
