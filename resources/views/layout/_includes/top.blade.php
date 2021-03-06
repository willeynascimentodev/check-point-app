<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('titulo')</title>

    <!-- Custom fonts for this template -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    
    @stack('css')

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Controle de Ponto</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                @if(Auth::user()->nivel == 2)
                    <a class="nav-link" href="{{ route('gestor.home') }}">
                        <i class="fas fa-fw fa fa-home"></i>
                        <span>Home</span></a>
                @elseif(Auth::user()->nivel == 1)
                    <a class="nav-link" href={{ route('funcionario.home') }}>
                        <i class="fas fa-fw fa fa-list"></i>
                        <span>Registar Ponto</span></a>
                @endif
                
                </a>            
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">



            @if(Auth::user()->nivel == 2)
                <!-- Heading -->
                <div class="sidebar-heading">
                    Navega????o
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Funcion??rios</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('funcionarios.create') }}">Criar</a>
                            <a class="collapse-item" href="{{ route('funcionarios.index') }}">Listar</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('funcionarios.trash') }}">
                        <i class="fas fa-fw fa-trash"></i>
                        <span>Funcion??rios Exclu??dos</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('gestor.pontos') }}">
                        <i class="fas fa-fw fa-list"></i>
                        <span>Registros de Ponto</span>
                    </a>
                </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Configura????es
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="#">Perfil</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('perfil') }}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Perfil</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('senha') }}">
                    <i class="fas fa-fw fa-key"></i>
                    <span>Alterar Senha</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('sair') }}">
                    <i class="fas fa-fw fa-arrow-left"></i>
                    <span>Sair</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        