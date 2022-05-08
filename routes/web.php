<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Gestor\UserController as GestorUserController;
use App\Http\Controllers\Funcionario\UserController as FuncionarioUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/auth', [UserController::class, 'auth'])->name('auth');
Route::get('/cadastro', [UserController::class, 'cadastro'])->name('cadastro');
Route::post('/cadastrar', [UserController::class, 'cadastrar'])->name('cadastrar');



Route::get('/gestor/home', [GestorUserController::class, 'home'])->name('gestor.home')->middleware('auth.gestor');
Route::get('/funcionario/home', [FuncionarioUserController::class, 'home'])->name('funcionario.home')->middleware('auth.funcionario');


