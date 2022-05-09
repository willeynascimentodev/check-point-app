<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

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

    public function buscarPontos() {
        $pontos = DB::select (DB::raw(
            '
            SELECT 
                f.id, uf.nome, uf.cargo, TIMESTAMPDIFF(YEAR, uf.nascimento, NOW()) as idade, ug.nome as gestor, p.created_at
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
            WHERE ug.id = '.Auth::user()->id.';
            '
        ) );

        return $pontos;
    }

}
