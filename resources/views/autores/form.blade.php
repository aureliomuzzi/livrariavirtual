@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fas fa-user"></i> Usuários
    <small class="text-muted">- Formulário</small>
</h1>
@stop

@section('content')

<div class="row">
    <div class="col-lg -12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Preencha as informções necessárias
                </h3>
            </div>

            <div class="card-body">
                @include('includes.alerts')

                @if (!isset($autores))
	    			{!! Form::open(['url' => route('autores.store'), 'files' => true]) !!}
                @else
                    {!! Form::model($autores, ['route' => ['autores.update', $autores->id], 'method' => 'PUT', 'files' => true]) !!}
                @endif

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Dados do Usuário</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    {!! Form::label('firstName', 'Primeiro Nome') !!}
                                    {!! Form::text('firstName', null, ['class' => 'form-control', 'placeholder' => 'Primeiro Nome do Autor']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('lastName', 'Ultimo Nome') !!}
                                    {!! Form::text('lastName', null, ['class' => 'form-control', 'placeholder' => 'Segundo Nome do Autor']) !!}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>

                <div class="mt-5">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
                    <a href="{{ route('autores.list') }}" class="btn btn-danger"><i class="far fa-times-circle"></i> Cancelar</a>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop
