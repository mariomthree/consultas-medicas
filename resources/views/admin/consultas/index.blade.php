@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
@stop

@section('title')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Visualizar consultas</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop

@section('content')
    <div class="row">
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
                            <h3 class="card-title">Consultas</h3>
                        </div>
                        <div class="card-body  table-responsive">
                            <table id="table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Paciente</th>
                                        <th>Medico</th>
                                        <th>Data Marcação</th>
                                        <th>Acção</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($consultas)
                                        @foreach ($consultas as $consulta)
                                            <tr>
                                                <td>{{ $consulta->id }}</td>
                                                <td>{{ $consulta->paciente->nome }}</td>
                                                <td>{{ $consulta->medico->nome }}</td>
                                                <td>{{ $consulta->dataMarcacao }}</td>
                                                <td class="text-left py-0 align-middle">
                                                    {!! Form::open(['method' => 'DELETE', 'action' => ['App\Http\Controllers\ConsultaController@destroy', $consulta->id]]) !!}
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="{{ route('consultas.edit', $consulta->id) }}"
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
    </div>
@stop
