@extends('adminlte::page')

@section('title', 'Livros')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fas fa-user"></i> Livros
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

                @if (!isset($livro))
	    			{!! Form::open(['url' => route('livros.store'), 'files' => true]) !!}
                @else
                    {!! Form::model($livro, ['route' => ['livros.update', $livro->id], 'method' => 'PUT', 'files' => true]) !!}
                @endif

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Dados do Livro</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    {!! Form::label('autor_id', 'Autor') !!}
                                    {!! Form::text('autor_id', null, ['class' => 'form-control', 'placeholder' => 'Nome do Autor']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('title', 'Titulo') !!}
                                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Nome do Titulo']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('isbn', 'ISBN') !!}
                                    {!! Form::text('isbn', null, ['class' => 'form-control', 'placeholder' => 'ISBN do Livro']) !!}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>

                <div class="mt-5">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
                    <a href="{{ route('livros.index') }}" class="btn btn-danger"><i class="far fa-times-circle"></i> Cancelar</a>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop
