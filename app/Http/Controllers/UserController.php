<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function cadastrar() {
        dd('Cadastrar');
    }
}
