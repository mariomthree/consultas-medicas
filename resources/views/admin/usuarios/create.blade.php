@extends('adminlte::page')

@section('title', 'Criar Usuarios')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-12">
            <h1 class="m-0 text-dark">Criar Usuarios</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop

@section('content')
    {!! Form::open(['method' => 'POST', 'action' => ['App\Http\Controllers\UsuarioController@store'], 'id' => 'form', 'files' => true]) !!}
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
                                {!! Form::label('name', 'Nome:', ['class' => 'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('email', 'E-mail:', ['class' => 'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::email('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '')]) !!}
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('password', 'Palavra-passe:', ['class' => 'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : '')]) !!}
                                    @if ($errors->has('password'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('is_active', 'Estado:', ['class' => 'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::select('is_active', [0 => 'Inactivo', 1 => 'Activo'], 1, ['class' => 'form-control custom-select']) !!}
                                    @if ($errors->has('is_active'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('is_active') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('role_id', 'Função:', ['class' => 'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::select('role_id', $roles, null, ['class' => 'form-control custom-select']) !!}
                                    @if ($errors->has('role_id'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('role_id') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('description', 'Descrição:', ['class' => 'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::textarea('description', null, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'rows' => 3]) !!}
                                    <small>Breve descrição sobre o utilizador.</small>
                                    @if ($errors->has('description'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('description') }}</strong>
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
