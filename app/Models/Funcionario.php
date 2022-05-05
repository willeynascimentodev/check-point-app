<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    function user() {
        return $this->belongsTo(User::class);
    }

    public function pontos() {
        return $this->hasMany(Ponto::class);
    }
}
