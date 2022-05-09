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

Route::get('/cadastro', [UserController::class, 'cadastro'])->name('cadastro');
Route::post('/cadastrar', [UserController::class, 'cadastrar'])->name('cadastrar');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/auth', [UserController::class, 'auth'])->name('auth');

Route::get('/sair', [UserController::class, 'sair'])->name('sair');



Route::get('/gestor/home', [GestorUserController::class, 'home'])->name('gestor.home')->middleware('auth.gestor');
Route::get('/funcionario/home', [FuncionarioUserController::class, 'home'])->name('funcionario.home')->middleware('auth.funcionario');

Route::get('/senha', [UserController::class, 'editarSenha'])->name('senha')->middleware('auth');
Route::post('/alterarSenha', [UserController::class, 'alterarSenha'])->name('alterar.senha')->middleware('auth');

Route::get('/perfil', [UserController::class, 'editarPerfil'])->name('perfil')->middleware('auth');
Route::post('/editarRegistro', [UserController::class, 'alterarRegistro'])->name('alterar.perfil')->middleware('auth');

Route::resource('/funcionarios', FuncionarioUserController::class)->names('funcionarios')->middleware('auth.gestor');
Route::get('/registros-apagados', [FuncionarioUserController::class, 'indexTrash'])->name('funcionarios.trash')->middleware('auth.gestor');
Route::delete('/apagar-registro/{funcionario}', [FuncionarioUserController::class, 'forceDestroy'])->name('funcionarios.force.destroy')->middleware('auth.gestor');
Route::put('/apagar-registro/{funcionario}', [FuncionarioUserController::class, 'restoreTrashed'])->name('funcionarios.restore')->middleware('auth.gestor');




