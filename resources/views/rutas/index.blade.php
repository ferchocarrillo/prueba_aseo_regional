@extends('adminlte::page')

@section('title_postfix', ' | Rutas')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
@endsection
@section('content_header')
    <a href="{{ route('rutas.create') }}" class="btn btn-primary float-right">Registrar Nuevas Rutas</a>
    <h1>Lista de Rutas</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover" id="rutasTable">
                <thead class="table-info">
                    <tr>
                        <th>Id</th>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Actions</th>
                    </tr>
                <tbody>
                    @foreach ($rutas as $rt)
                        <tr>
                            <td>{{ $rt->id }}</td>
                            <td>{{ $rt->codigo }}</td>
                            <td>{{ $rt->nombre }}</td>
                            <td>
                                <form action="{{ url('/rutas/'.$rt->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ url('/rutas/' . $rt->id . '/edit') }}" class="btn btn-info btn-sm"
                                        role="button" aria-pressed="true" title="Edit Case">
                                        <i class="fas fa-eye-dropper"></i>
                                    </a>
                                    <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
@stop
@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#rutasTable').DataTable();
        });
    </script>
@endpush
