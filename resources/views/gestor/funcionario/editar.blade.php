@extends('layout.sistema')

@section('titulo', 'Editar Funcionário')

@section('conteudo')

 <!-- Begin Page Content -->
 <div class="p-5 container container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Editar Funcionário</h6>
        </div>
        <div class="card-body text-center">
            <form class="user" action="{{ route('funcionarios.update', $user) }}" method="post">
                @csrf
                @method('PUT');
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                
                <div class="form-group">
                    @if (session('status'))
                        <small style="color: green;">
                            {{ session('status') }}
                        </small>
                    @endif
                </div>

                <div class="form-group">
                    <input required type="text" class="form-control form-control-user"
                        minlength="6" maxlength="191" id="nome" name="nome" value="{{ old('nome', $user->nome) }}"
                        placeholder="Digite o nome...">
                </div>

                <div class="form-group">
                    <input required type="text" class="form-control form-control-user"
                        minlength="6" maxlength="191" id="cargo" name="cargo" value="{{ old('cargo', $user->cargo) }}"
                        placeholder="Digite o cargo...">
                </div>

                <div class="form-group">
                    <input required type="text" class="form-control cpf form-control-user"
                    minlength="14" maxlength="14" id="cpf" name="cpf" value="{{ old('cpf', $user->cpf) }}"
                        placeholder="Digite o cpf...">
                        @if ($errors->has('cpf'))
                            <small style="color: red;">
                                {{ $errors->first('cpf') }}
                            </small>
                        @endif
                </div>

                <div class="form-group">
                    <input required type="email" class="form-control form-control-user"
                        minlength="6" maxlength="191" id="email" name="email" value="{{ old('email', $user->email) }}"
                        placeholder="Digite o e-mail...">
                        @if ($errors->has('email'))
                            <small style="color: red;">
                                {{ $errors->first('email') }}
                            </small>
                        @endif
                </div>

                <div class="form-group">
                    <input required type="date" class="form-control form-control-user"
                        minlength="6" maxlength="191" id="data" name="nascimento" value="{{ old('nascimento', $user->nascimento) }}"
                        placeholder="Digite o nascimento...">
                </div>

                <div class="form-group">
                    <input required type="text" class="form-control form-control-user"
                        minlength="6" maxlength="10" id="cep" name="cep" value="{{ old('cep', $user->cep) }}"
                        placeholder="Digite o CEP...">
                        <small id="alert-cep" style="color: red;"></small>
                </div>

                <div class="form-group">
                    <input required type="text" class="form-control form-control-user"
                        minlength="6" maxlength="191"  id="endereco" name="endereco" value="{{ old('endereco', $user->endereco) }}"
                        placeholder="Preenchido automaticamente...">
                </div>

                <div class="form-group">
                    <input required type="text" class="form-control form-control-user"
                        minlength="1" maxlength="10" id="numero" name="numero" value="{{ old('numero', $user->numero) }}"
                        placeholder="Número...">
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