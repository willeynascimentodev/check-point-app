@extends('layout.sistema')

@section('titulo', 'Cadastrar Funcionário')

@section('conteudo')

 <!-- Begin Page Content -->
 <div class="p-5 container container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Cadastrar Funcionário</h6>
        </div>
        <div class="card-body text-center">
            <form class="user" action="{{ route('funcionarios.store') }}" method="post">
                @csrf

                <div class="form-group">
                    @if (session('status'))
                        <small style="color: green;">
                            {{ session('status') }}
                        </small>
                    @endif
                </div>

                <div class="form-group">
                    <input required type="text" class="form-control form-control-user"
                        minlength="6" maxlength="191" id="nome" name="nome" value="{{ old('nome') }}"
                        placeholder="Digite o nome...">
                </div>

                <div class="form-group">
                    <input required type="text" class="form-control form-control-user"
                        minlength="6" maxlength="191" id="cargo" name="cargo" value="{{ old('cargo') }}"
                        placeholder="Digite o cargo...">
                </div>

                <div class="form-group">
                    <input required type="text" class="form-control cpf form-control-user"
                    minlength="14" maxlength="14" id="cpf" name="cpf" value="{{ old('cpf') }}"
                        placeholder="Digite o cpf...">
                        @if ($errors->has('cpf'))
                            <small style="color: red;">
                                {{ $errors->first('cpf') }}
                            </small>
                        @endif
                </div>

                <div class="form-group">
                    <input required type="email" class="form-control form-control-user"
                        minlength="6" maxlength="191" id="email" name="email" value="{{ old('email') }}"
                        placeholder="Digite o e-mail...">
                        @if ($errors->has('email'))
                            <small style="color: red;">
                                {{ $errors->first('email') }}
                            </small>
                        @endif
                </div>

                <div class="form-group">
                    <input required type="date" class="form-control form-control-user"
                        minlength="6" maxlength="191" id="data" name="nascimento" value="{{ old('nascimento') }}"
                        placeholder="Digite o nascimento...">
                </div>

                <div class="form-group">
                    <input required type="text" class="form-control form-control-user"
                        minlength="6" maxlength="10" id="cep" name="cep" value="{{ old('cep') }}"
                        placeholder="Digite o CEP...">
                        <small id="alert-cep" style="color: red;"></small>
                </div>

                <div class="form-group">
                    <input required type="text" class="form-control form-control-user"
                        minlength="6" maxlength="191"  id="endereco" name="endereco" value="{{ old('endereco') }}"
                        placeholder="Preenchido automaticamente...">
                </div>

                <div class="form-group">
                    <input required type="text" class="form-control form-control-user"
                        minlength="1" maxlength="10" id="numero" name="numero" value="{{ old('numero') }}"
                        placeholder="Número...">
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

    @push('js')
        <!-- Script de validação do CEP -->
        <script src={{ asset("js/cep.js") }}></script>
    @endpush
@endsection