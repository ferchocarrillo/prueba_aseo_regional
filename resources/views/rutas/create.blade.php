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
    {!! Form::open(['route' => 'rutas.store', 'method' => 'POST']) !!}
    @include('rutas.form')
    {!! Form::close() !!}
@stop
@push('js')
    <script src="sweetalert2.all.min.js"></script>
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
          })
    </script>
@endpush
