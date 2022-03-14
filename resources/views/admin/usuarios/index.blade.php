@extends('adminlte::page')

@section('title', 'Visualizar Usuarios')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-12">
            <h1 class="m-0 text-dark">Visualizar Usuarios</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop

@section('content')
    
    <div class="container-fluid">
        <div class="text-center">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Usuarios</h3>
                    </div>
                    <div class="card-body  table-responsive">
                        <table id="table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Estado</th>
                                    <th>Função</th>
                                    <th>Acção</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($usuarios)
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td>{{ $usuario->id }}</td>
                                            <td>{{ $usuario->name }}</td>
                                            <td>{{ $usuario->email }}</td>
                                            <td>{{ $usuario->is_active == 1 ? 'Activo' : 'Inactivo' }}</td>
                                            <td>{{ $usuario->roles->first()['display_name'] }}</td>
                                            <td class="text-left py-0 align-middle">
                                                {!! Form::open(['method' => 'DELETE', 'action' => ['App\Http\Controllers\UsuarioController@destroy', $usuario->id]]) !!}
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{ route('usuarios.edit', $usuario->id) }}"
                                                        class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fas fa-trash"></i></button>
                                                </div>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /.row -->
@stop
