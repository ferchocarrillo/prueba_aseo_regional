@extends('adminlte::page')
@section('title_postfix', ' | Nuevas Rutas')
@section('css')

@endsection
@section('content_header')
    <div class="float-right">
        <a href="/rutas" class="btn btn-info" type="button" title="return">
            <i class="fas fa-undo"></i>
        </a>
    </div>
    <h1>Crear Nuevas Rutas</h1>
@stop
@section('content')

    {!! Form::model($rutasEdit, ['route' => ['rutas.update', $rutasEdit->id], 'method' => 'PATCH']) !!}
    @include('rutas.form')
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
