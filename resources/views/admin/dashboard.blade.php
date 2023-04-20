@extends('adminlte::page')
@section('title', 'Dashboard')

@section('css')
<style>
    .img_home{
        width: 100%;
        height: 100%;
    }
</style>
@stop
@section('content')
   <img class="img_home"  src="\img\fondo1.jpg" alt="">
@stop
@section('js')
    <script> console.log('Bienvenidos a mi prueba para Promoambiental '); </script>
@stop
