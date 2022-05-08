@extends('layout.sistema')

@section('titulo', 'Nova Senha')

@section('conteudo')

 <!-- Begin Page Content -->
 <div class="p-5 container container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Nova Senha</h6>
        </div>
        <div class="card-body text-center">
            <form class="user" action="{{ route('alterar.senha') }}" method="post">
                @csrf

                <div class="form-group">
                    @if (session('status'))
                        <small style="color: green;">
                            {{ session('status') }}
                        </small>
                    @endif
                </div>

                <div class="form-group">
                    <input required type="password" class="form-control form-control-user"
                        minlength="6" maxlength="191" id="password" name="password" placeholder="Digite sua senha...">
                </div>

                <div class="form-group">
                    <input required type="password" class="form-control form-control-user"
                        minlength="6" maxlength="191" id="password_confirmation" name="password_confirmation" placeholder="Digite sua senha novamente...">
                        @if ($errors->has('password'))
                            <small style="color: red;">
                                {{ $errors->first('password') }}
                            </small>
                        @endif
                </div>
            
                <button class="btn btn-primary btn-user btn-block">
                    Salvar
                </button>
                <hr>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

    
@endsection