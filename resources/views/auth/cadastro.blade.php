<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Controle de Ponto Ticto - Cadastro</title>
    <!-- Custom fonts for this template-->
    <link href={{ asset("vendor/fontawesome-free/css/all.min.css") }} rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Cadastro de Gestor</h1>
                                    </div>
                                    <form class="user" action="{{ route('cadastrar') }}" method="post">
                                        @csrf

                                        <div class="form-group">
                                            <input required type="text" class="form-control form-control-user"
                                                minlength="6" maxlength="191" id="nome" name="nome" value="{{ old('nome') }}"
                                                placeholder="Digite seu nome...">
                                        </div>

                                        <div class="form-group">
                                            <input required type="text" class="form-control cpf form-control-user"
                                            minlength="14" maxlength="14" id="cpf" name="cpf" value="{{ old('cpf') }}"
                                                placeholder="Digite seu cpf...">
                                                @if ($errors->has('cpf'))
                                                    <small style="color: red;">
                                                        {{ $errors->first('cpf') }}
                                                    </small>
                                                @endif
                                        </div>

                                        <div class="form-group">
                                            <input required type="email" class="form-control form-control-user"
                                                minlength="6" maxlength="191" id="email" name="email" value="{{ old('email') }}"
                                                placeholder="Digite seu e-mail...">
                                                @if ($errors->has('email'))
                                                <small style="color: red;">
                                                    {{ $errors->first('email') }}
                                                </small>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input required type="date" class="form-control form-control-user"
                                                minlength="6" maxlength="191" id="data" name="nascimento" value="{{ old('nascimento') }}"
                                                placeholder="Digite seu nascimento...">
                                        </div>

                                        <div class="form-group">
                                            <input required type="text" class="form-control form-control-user"
                                                minlength="6" maxlength="10" id="cep" name="cep" value="{{ old('cep') }}"
                                                placeholder="Digite seu CEP...">
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
                                                placeholder="N??mero...">
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
                                            Cadastre-se
                                        </button>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">Fa??a login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src={{ asset("vendor/jquery/jquery.min.js") }} ></script>
    <!-- Bootstrap core JavaScript-->
    <script src={{ asset("vendor/bootstrap/js/bootstrap.bundle.min.js") }}></script>
    <!-- Core plugin JavaScript-->
    <script src={{ asset("vendor/jquery-easing/jquery.easing.min.js") }}></script>
    <!-- Custom scripts for all pages-->
    <script src={{ asset("js/sb-admin-2.min.js") }}></script>
    <!-- Biblioteca para m??scaras JS -->
    <!-- Script de valida????o do CEP -->
    <script src={{ asset("js/cep.js") }}></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <script type="text/javascript">
        $(".cpf").mask("000.000.000-00");
    </script>
    
    


</body>

</html>