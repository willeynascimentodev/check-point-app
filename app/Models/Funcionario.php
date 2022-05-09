<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Funcionario extends Model
{
    use HasFactory, SoftDeletes;
    

    protected $fillable = [
        'user_gestor_id',
    ];

    public function pontos() {
        return $this->hasMany(Ponto::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function userTrashed() {
        return User::withTrashed()->where('id', $this->user_id)->first();
    }

}
