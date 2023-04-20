@extends('adminlte::page')
@section('title_postfix', ' | Nuevos Clientes')
@section('css')

@endsection
@section('content_header')
    <div class="float-right">
        <a href="/clientes" class="btn btn-info" type="button" title="return">
            <i class="fas fa-undo"></i>
        </a>
    </div>
    <h1>Crear Nuevos Clientes</h1>
@stop
@section('content')

    {!! Form::model($clientesEdit, ['route' => ['clientes.update', $clientesEdit->id], 'method' => 'PATCH']) !!}
    @include('clientes.form')
    {!! Form::close() !!}
@stop
@push('js')
    <script src="sweetalert2.all.min.js"></script>
    <script>
        Swal.fire(
            'Rutas',
            'Lista de rutas',
            'success'
        )
    </script>
@endpush
