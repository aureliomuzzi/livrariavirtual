@extends('adminlte::page')

@section('title', 'Livros')



@section('content_header')
<h1 class="m-0 text-dark"><i class="fas fa-books"></i>  Livros da Vitrine</h1>
@stop

@section('content')
<div class="card">

    <div class="card-body">
        @include('includes.alerts')

        <div class="table-responsive">
            {{ $dataTable->table(['class'=>'table table-striped','style' => 'width: 100%']) }}
        </div>


    </div>
</div>

@stop

@push('js')
    {{ $dataTable->scripts() }}
    <script>
        $('table').on('draw.dt', function() {
            $('[data-toggle="tooltip"]').tooltip();
        })
    </script>
@endpush
