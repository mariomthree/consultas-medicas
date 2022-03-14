@extends('adminlte::page')

@section('title', 'Editar Usuarios')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-12">
            <h1 class="m-0 text-dark">Meu Perfil</h1>
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
            <div class="col-sm-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Dados</h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="card-body">
                            {!! Form::model($usuario, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\UsuarioController@updateInformation', $usuario->id], 'id' => 'form', 'files' => true]) !!}
                            <div class="form-group row">
                                {!! Form::label('name', 'Nome:', ['class' => 'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('name', $usuario->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}
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
                                    {!! Form::email('email', $usuario->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '')]) !!}
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('description', 'Descrição:', ['class' => 'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::textarea('description', $usuario->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'rows' => 3]) !!}
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
                        {!! Form::close() !!}
                    </div><!-- /.card-body -->
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Alterar Senha</h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="card-body">
                            {!! Form::model($usuario, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\UsuarioController@updatePassword'], 'id' => 'form', 'files' => true]) !!}
                            <div class="form-group row">
                                {!! Form::label('current_password', 'Senha actual:', ['class' => 'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::password('current_password', ['class' => 'form-control' . ($errors->has('current_password') ? ' is-invalid' : '')]) !!}
                                    @if ($errors->has('current_password'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('current_password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('password', 'Nova Senha:', ['class' => 'col-sm-2 col-form-label']) !!}
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
                                {!! Form::label('confirm', 'Confirmar Senha:', ['class' => 'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::password('confirm', ['class' => 'form-control' . ($errors->has('confirm') ? ' is-invalid' : '')]) !!}
                                    @if ($errors->has('confirm'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('confirm') }}</strong>
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
                        {!! Form::close() !!}
                    </div><!-- /.card-body -->
                </div>
                <!-- /.col -->

            </div>
        </div>
    </div>
@stop
