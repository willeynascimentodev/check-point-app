@extends('layout.sistema')

@section('titulo', 'Pontos')

@section('conteudo')

 <!-- Begin Page Content -->
 <div class="p-5 container container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de pontos</h6>
        </div>
        <div class="card-body">
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="table-responsive">
       
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Cargo</th>
                            <th>Idade</th>
                            <th>Gestor</th>
                            <th>Data de Registro</th>
                            <th>Tipo</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Cargo</th>
                            <th>Idade</th>
                            <th>Gestor</th>
                            <th>Data de Registro</th>
                            <th>Tipo</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach($registros as $r)
                        <tr>
                            <td>{{ $r->id }}</td>
                            <td>{{ $r->nome }}</td>
                            <td>{{ $r->cargo }}</td>
                            <td>{{ $r->idade }}</td>
                            <td>{{ $r->gestor }}</td>
                            <td>{{ $r->created_at }}</td>
                            <td>{{ $r->tipo }}</td>
                   
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@push('js')

@endpush

    
@endsection