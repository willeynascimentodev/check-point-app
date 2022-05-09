<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
use DateTime;

class Ponto extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
    ];

    function funcionario() {
        return $this->belongsTo(Funcionario::class);
    }

    public function ultimaEntrada() {
        $funcionario = User::find(Auth::user()->id)->funcionario;
        $ponto = Ponto::where('funcionario_id', $funcionario->id)->orderBY('id', 'desc')->first();
        return $ponto;
    }

    public function buscarPontosData($dataMin, $dataMax) {

        $pontos = DB::select (DB::raw(
            "
            SELECT 
                f.id, uf.nome, uf.cargo, TIMESTAMPDIFF(YEAR, uf.nascimento, NOW()) as idade, ug.nome as gestor, p.created_at, p.tipo
            FROM 
                pontos as p
            INNER JOIN
                funcionarios as f
            ON 
                p.funcionario_id = f.id
            INNER JOIN
                users as uf
            ON 
                f.user_id = uf.id
            INNER JOIN
                users as ug
            ON 
                f.user_gestor_id = ug.id
            WHERE ug.id = ".Auth::user()->id."
            AND p.created_at >= '".$dataMin."'
            AND p.created_at <= '".$dataMax."'
            "
        ) );

        //ug corresponde ao usuário gestor.
        //uf corresponde ao usuário funcionário.

        return $pontos;
    }


    public function buscarPontos() {

        $pontos = DB::select (DB::raw(
            "
            SELECT 
                f.id, uf.nome, uf.cargo, TIMESTAMPDIFF(YEAR, uf.nascimento, NOW()) as idade, ug.nome as gestor, p.created_at, p.tipo
            FROM 
                pontos as p
            INNER JOIN
                funcionarios as f
            ON 
                p.funcionario_id = f.id
            INNER JOIN
                users as uf
            ON 
                f.user_id = uf.id
            INNER JOIN
                users as ug
            ON 
                f.user_gestor_id = ug.id
            WHERE ug.id = ".Auth::user()->id."
            "
        ) );

        //ug corresponde ao usuário gestor.
        //uf corresponde ao usuário funcionário.

        return $pontos;
    }

}
