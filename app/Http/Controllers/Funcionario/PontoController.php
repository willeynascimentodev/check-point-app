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
        if($ponto->ultimaEntrada()) {
            $ultimoPonto = $ponto->ultimaEntrada()->tipo;
        } else {
            $ultimoPonto = null;
        }

        $funcionario = User::find(Auth::user()->id)->funcionario;

        if(strcmp($ultimoPonto, 'entrada') == 0 && $ultimoPonto != null) {
            $dados['tipo'] = 'saida';
        } else if(strcmp($ultimoPonto, 'saida') == 0 || $ultimoPonto === null) {
            $dados['tipo'] = 'entrada';
        }
        
        $funcionario->pontos()->create($dados);

        return redirect()->route('funcionario.home')->with('status', 'Ponto registrado com sucesso.');
    }

    public function registros(Request $req) {

        $ponto = new Ponto();

        if(isset($req->dataMin)) {    
            $dataMin = $req->dataMin;
            $dataMax = $req->dataMax;

            if ($dataMax <= $dataMin || $dataMax == null) {
                $dataMax = date('Y-m-d', strtotime('+1 day', strtotime($dataMin)));
            }
            
            $data['dataMin'] = $dataMin;
            $data['dataMax'] = $dataMax;

            $registros = $ponto->buscarPontosData($dataMin, $dataMax);    
            return view('gestor.ponto.listar', compact('registros', 'data') );
        } else {
            $registros = $ponto->buscarPontos();
            return view('gestor.ponto.listar', compact('registros'));
        }
    }
}
