<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Controle de Ponto Ticto - Cadastro</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
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
                                                id="nome" name="nome" value="{{ old('nome') }} "
                                                placeholder="Digite seu nome...">
                                                
                                        </div>

                                        <div class="form-group">
                                            <input required type="text" class="form-control cpf form-control-user"
                                                id="cpf" name="cpf" value="{{ old('cpf') }} "
                                                placeholder="Digite seu cpf...">
                                        </div>

                                        <div class="form-group">
                                            <input required type="email" class="form-control form-control-user"
                                                id="email" name="email" value="{{ old('email') }} "
                                                placeholder="Digite seu e-mail...">
                                        </div>

                                        <div class="form-group">
                                            <input required type="date" class="form-control form-control-user"
                                                id="data" name="nascimento" value="{{ old('nascimento') }} "
                                                placeholder="Digite seu nascimento...">
                                        </div>

                                        <div class="form-group">
                                            <input required type="text" class="form-control form-control-user"
                                                id="cep" name="cep" value="{{ old('cep') }} "
                                                placeholder="Digite seu CEP...">
                                        </div>

                                        <div class="form-group">
                                            <input required type="text" class="form-control form-control-user"
                                                id="endereco" name="endereco" value="{{ old('endereco') }} "
                                                placeholder="Preenchido automaticamente...">
                                        </div>

                                        <div class="form-group">
                                            <input required type="text" class="form-control form-control-user"
                                                id="numero" name="numero" value="{{ old('numero') }} "
                                                placeholder="Número...">
                                        </div>
                                        
                                        <div class="form-group">
                                            <input required type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Digite sua senha...">
                                        </div>

                                        <div class="form-group">
                                            <input required type="password" class="form-control form-control-user"
                                                id="confirm-password" name="confirm-password" placeholder="Digite sua senha novamente...">
                                        </div>

                                        <button class="btn btn-primary btn-user btn-block">
                                            Cadastre-se
                                        </button>
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Biblioteca para máscaras JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <script type="text/javascript">
        $(".cpf").mask("000.000.000-25");
    </script>

</body>

</html>