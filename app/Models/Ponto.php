<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

}
