@extends('adminlte::page')

@section('title', 'Criar Medicos')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Criar Medicos</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop

@section('content')


    {!! Form::open(['method' => 'POST', 'action' => ['App\Http\Controllers\MedicoController@store'], 'id' => 'form', 'files' => true]) !!}
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header p-2">
                        </div><!-- /.card-header -->
                        <div class="card-body">

                            <div class="form-group row">
                                {!! Form::label('nome', 'Nome:', ['class' => 'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('nome', null, ['class' => 'form-control' . ($errors->has('nome') ? ' is-invalid' : '')]) !!}
                                    @if ($errors->has('nome'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('nome') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('apelido', 'Apelido:', ['class' => 'col-sm-2 col-form-label ']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('apelido', null, ['class' => 'form-control' . ($errors->has('apelido') ? ' is-invalid' : ''), 'size' => 9]) !!}
                                    @if ($errors->has('apelido'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('apelido') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('dataNascimento', 'Data de Nascimento:', ['class' => 'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::date('dataNascimento', null, ['class' => 'form-control ' . ($errors->has('dataNascimento') ? ' is-invalid' : '')]) !!}
                                    @if ($errors->has('dataNascimento'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('dataNascimento') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('especialidade', 'Especialidade:', ['class' => 'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('especialidade', null, ['class' => 'form-control' . ($errors->has('especialidade') ? ' is-invalid' : ''), 'rows' => 3]) !!}
                                    @if ($errors->has('especialidade'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('especialidade') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('postoMedico', 'Posto Medico:', ['class' => 'col-sm-2 col-form-label ']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('postoMedico', null, ['class' => 'form-control' . ($errors->has('postoMedico') ? ' is-invalid' : ''), 'size' => 9]) !!}
                                    @if ($errors->has('postoMedico'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('postoMedico') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
							<div class="form-group row">
                                <div class="col-sm-10 offset-2">
                                    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                        </div>
                    </div><!-- /.card-body -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    {!! Form::close() !!}


@stop
