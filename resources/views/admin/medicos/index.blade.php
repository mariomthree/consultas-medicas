@extends('adminlte::page')

@section('title', 'Visualizar Medicos')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Visualizar Medicos</h1>
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
                        <h3 class="card-title">Medicos</h3>
                    </div>
                    <div class="card-body  table-responsive">
                        <table id="table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Apelido</th>
                                    <th>Data Nascimento</th>
                                    <th>Especialidade</th>
                                    <th>Posto Medico</th>
                                    <th>Acção</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($medicos)
                                    @foreach ($medicos as $medico)
                                        <tr>
                                            <td>{{ $medico->id }}</td>
                                            <td>{{ $medico->nome }}</td>
                                            <td>{{ $medico->apelido }}</td>
                                            <td>{{ $medico->dataNascimento }}</td>
                                            <td>{{ $medico->especialidade }}</td>
                                            <td>{{ $medico->postoMedico }}</td>
                                            <td class="text-left py-0 align-middle">
                                                {!! Form::open(['method' => 'DELETE', 'action' => ['App\Http\Controllers\MedicoController@destroy', $medico->id]]) !!}
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{ route('medicos.edit', $medico->id) }}"
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
@stop
