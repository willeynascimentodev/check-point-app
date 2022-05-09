@extends('layout.sistema')

@section('titulo', 'Listar')

@section('conteudo')

 <!-- Begin Page Content -->
 <div class="p-5 container container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de funcionários excluídos</h6>
        </div>
        <div class="card-body">
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="table-responsive">
                <div class='form-group'>
                    <form action="{{ route('funcionarios.trash') }}">
                        <input type="text" class='form-control col-sm-6 d-inline' name="pesquisa" placeholder="Digite o nome...">
                        <input type="submit" class='form-control col-sm-2 d-inline' value="Pesquisar">
                    </form>
                </div>
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Email</th>
                            <th>Cargo</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Email</th>
                            <th>Cargo</th>
                            <th>Restaurar</th>
                            <th>Excluir</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach($funcionarios as $f)
                        <tr>
                            <td>{{ $f->userTrashed()->id }}</td>
                            <td>{{ $f->userTrashed()->nome }}</td>
                            <td>{{ $f->userTrashed()->cpf }}</td>
                            <td>{{ $f->userTrashed()->email }}</td>
                            <td>{{ $f->userTrashed()->cargo }}</td>
                            <td>  
                                <a name="btn-action" id="btn-action-{{ $f->id }}" data-item-id="form-restore-{{ $f->id }}" href="#">
                                    <i class="fa fa-recycle"></i>
                                </a>
                                <form method="post" id="form-restore-{{ $f->id }}" action="{{ route('funcionarios.restore', ['funcionario' => $f->id]) }}">
                                    @csrf
                                    @method('PUT')
                                </form>
                            </td>
                            <td>  
                                <a name="btn-action" id="btn-action-{{ $f->id }}" data-item-id="form-delete-hard-{{ $f->id }}" href="#">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form method="post" id="form-delete-hard-{{ $f->id }}" action="{{ route('funcionarios.force.destroy', ['funcionario' => $f->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>

                   
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @if(isset($dataForm)) 
                    {{ $funcionarios->appends($dataForm)->links() }}
                @else
                    {{ $funcionarios->links() }}
                @endif
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@push('js')
    <script src="{{ asset('js/assets.js') }} "></script>
@endpush

    
@endsection