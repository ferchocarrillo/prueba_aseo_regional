@extends('adminlte::page')

@section('title_postfix', ' | Clientes')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">

    <style>
        .page {
            position: relative;
            padding-bottom: 56.25%;
            /* 16:9, for an aspect ratio of 1:1 change to this value to 100% */
        }

        iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .td_button {
            margin: auto;
            text-align: center;
        }

        .th_button {
            margin: auto;
            text-align: center;
        }
    </style>
@endsection
@section('content_header')
    <a href="{{ route('clientes.create') }}" class="btn btn-primary float-right">Registrar Nuevos Clientes</a>
    <h1>Lista de Clientes</h1>
@stop
@section('content')

    <input type="hidden" name="rt1" id="rt1"
        value="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d254516.1550155868!2d">
    <input type="hidden" name="rt3" id="rt3" value="!3d">
    <input type="hidden" name="rt5" id="rt5"
        value="!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sco!4v1681615424995!5m2!1ses!2sco">
    <div class="card">
        <div class="card-body">
            <table class="table table-hover" id="clientesTable">
                <thead class="table-info">
                    <tr>

                        <th>Documento</th>
                        <th>Nombre y apellidos</th>
                        <th>Telefono</th>
                        <th>Ubicacion en mapa</th>
                        <th>Ruta</th>
                        <th>Actions</th>
                    </tr>
                <tbody>
                    @foreach ($clientes as $key => $cls)
                        <tr>

                            <td>{{ $cls->documento }}</td>
                            <td name="names" id="names">{{ $cls->nombres }} {{ $cls->apellidos }}</td>
                            <td>{{ $cls->telefono }}</td>


                            <td class="td_button"><button class="btn btn-warning btn-sm detail-button">

                                    <a id="url" href="" target="iframe_a" rel="nofollow" class="automatic"
                                        onclick="valores();"><i class="fas fa-map-marker-alt"></i></a>




                                    <input type="text" name="lat" id="lat" value="{{ $cls->lat }}">
                                    <input type="text" name="lgn" id="lng" value="{{ $cls->lng }}">

                                </button>
                                {{--  <input type="hidden" name="rt1" id="rt1" value="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d254516.1550155868!2d">
                                    <input type="text"  value="{{ $cls->lat }}">
                                    <input type="hidden" name="rt3" id="rt3" value="!3d">
                                    <input type="text"  value="{{ $cls->lng }}">
                                    <input type="hidden" name="rt5" id="rt5" value="!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sco!4v1681615424995!5m2!1ses!2sco">  --}}

                            </td>
                            <td>{{ $cls->ruta->nombre }}</td>
                            <td>
                                <form action="{{ url('/clientes/' . $cls->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ url('/clientes/' . $cls->id . '/edit') }}" class="btn btn-info btn-sm"
                                        role="button" aria-pressed="true">
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

    <div id="mapCanvas"></div>
    <hr>

    <div class="page">
        <iframe src="" name="iframe_a" class="frame" frameborder="0">

            <div id="map"></div>
        </iframe>
    </div>
    @push('js')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
        <script>
            //datatables
            $(document).ready(function() {
                $('#clientesTable').DataTable();
            });
        </script>

        <script>
            function valores() {

                var rt1 = document.getElementById('rt1').value;
                var lng = document.getElementById('lng').value;
                var rt3 = document.getElementById('rt3').value;
                var lat = document.getElementById('lat').value;
                var rt5 = document.getElementById('rt5').value;
                var names = document.getElementById('names').value;

                $('button').on('click', function() {
                    $('.td_button a').prop('href', rt1 + lng + rt3 + lat + rt5);
                    console.log('Todos los enlaces, ahora apuntan a ' + rt1 + lng + rt3 + lat + rt5);
                });

                function initMap() {
                    var map;
                    var bounds = new google.maps.LatLngBounds();
                    var mapOptions = {
                        mapTypeId: 'roadmap'
                    };

                    // Display a map on the web page
                    map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
                    map.setTilt(50);

                    // Multiple markers location, latitude, and longitude
                    var markers = [
                        [names, lat, lgn]
                    ];

                    // Add multiple markers to map
                    var infoWindow = new google.maps.InfoWindow(),
                        marker, i;

                    // Place each marker on the map
                    for (i = 0; i < markers.length; i++) {
                        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                        bounds.extend(position);
                        marker = new google.maps.Marker({
                            position: position,
                            map: map,
                            title: markers[i][0]
                        });

                        // Add info window to marker
                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                                infoWindow.setContent(infoWindowContent[i][0]);
                                infoWindow.open(map, marker);
                            }
                        })(marker, i));

                        // Center the map to fit all markers on the screen
                        map.fitBounds(bounds);
                    }

                    // Set zoom level
                    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
                        this.setZoom(14);
                        google.maps.event.removeListener(boundsListener);
                    });

                }
                // Load initialize function
                google.maps.event.addDomListener(window, 'load', initMap);
            }
        </script>


        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIGyzo_uPpG6iWg1P5OGTKhQzi7Bg0aG0"></script>
    @endpush
@stop
