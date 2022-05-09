@extends('layout.sistema')

@section('titulo', 'Home')

@section('conteudo')

 <!-- Begin Page Content -->
 <div class="p-5 container container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sistema de Controle de Ponto</h6>
        </div>
        <div class="card-body text-center">
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
           <h1>Bem-Vindo, {{ Auth::user()->nome }}!</h1>
           <h2>Registre seu ponto abaixo</h2>

           <form method="post" action="{{ route('pontos.store') }}">
                @csrf
                @if(!$ultimoPonto || $ultimoPonto->tipo === 'saida')
                    <a href="">
                        <button class="btn btn-success">Registrar Entrada</button>
                    </a>
                @elseif($ultimoPonto->tipo === 'entrada')
                    <a href="">
                        <button class="btn btn-danger">Registrar Saída</button>
                    </a>
                @endif
            </form>

           
        </div>
    </div>

</div>
<!-- /.container-fluid -->

    
@endsection