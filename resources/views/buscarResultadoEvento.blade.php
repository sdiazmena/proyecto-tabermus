@extends('layouts.prueba')

@section('content')
    <div class="col-sm-8 bloqueContenido">
        <br>
        <p class="titulo text-center"><img  src="{{ asset('img/titulos/busqueda.png') }}" style="width:350px; height: 90px"></p>
        <div>
            <div class="fondoContenido" id="contenidoMostrar">
                <div class="form-group">
                    {!! Form::open(['route' => 'buscar/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
                    <label for="palabraClave" class="letraTitulo col-xs-2">Nombre:</label>
                    <input type="text" class="col-xs-4" name = "nombre" >
                    <select name="tipo" class=" col-md-offset-1">
                        <option>Banda</option>
                        <option>Evento</option>
                    </select>
                    <button type="submit" class="btn btn-default col-md-offset-2">Buscar</button>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="fondoContenido" id="resultadoBusqueda">
                <h3 class="letraTitulo">Resultado para: {{$datos->palabra}}</h3>
                <h3 id="tituloBusqueda" class="letraTitulo"></h3>
                <table class="table table-condensed table-bordered">
                    <thead>
                    <tr class="letraTitulo">
                        <th>Nombre</th>
                        <th>Ciudad</th>
                        <th>Region</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                    </tr>
                    </thead>
                    <tbody class="letraTexto">
                    @foreach($datos as $dato)
                        <tr>
                            <td>{{ $dato->title }}</td>
                            @foreach($ciudades as $ciudad)
                                @if($ciudad->id == $dato->id_ciudad)                            
                                    <td>{{ $ciudad->nombre }}</td>
                                    @foreach($regiones as $region)
                                        @if($region->id == $ciudad->id_region)
                                            <td>{{ $region->nombre }}</td>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                            <td>{{substr($dato->start, 0,10)}}</td>
                            <td>{{substr($dato->end, 11,5)}}</td>
                            <td>
                                <button class="btn btn-danger btn-xs"  onclick="verShow({{$dato->id}})" >Ver</button>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div id="responsive-modal" class="modal fade" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content fondoContenido letraTitulo">
                    <div class="modal-header">
                        <h4 color="black" class="titulo">Informacion Show</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <strong>Nombre:</strong>
                            <span id="nombreShow"></span>
                        </div>
                        <div class="row">
                            <strong>Ciudad:</strong>
                            <span id="ciudadShow"></span>
                        </div>
                        <div class="row">
                            <strong>Fecha/Hora Inicio:</strong>
                            <span id="fechaShow"></span>
                        </div>
                        <div class="row">
                            <strong>Informacion:</strong>
                            <span id="infShow"></span>
                        </div>
                        <div class="row">
                            <strong>Valor:</strong>
                            <span id="valor"></span>
                        </div>
                        <div class="row">
                            <strong>Mas Informacion visitar:</strong>
                            <span id="facebook"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dafault letraPortada" data-dismiss="modal">Salir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        function verShow(valor) {
            $('#responsive-modal').modal('show');
            var BASEURL = '{{ url('/') }}';
            $.ajax({
                url: BASEURL+'/show/'+valor ,
                type : 'GET',
                success: function(result){
                    console.log(result);
                    $('#nombreShow').text(result[0].title);
                    $('#ciudadShow').text(result[0].id_ciudad);
                    $('#fechaShow').text(result[0].start);
                    $('#infShow').text(result[0].informacion);
                    $('#valor').text(result[0].precio);
                    $('#facebook').text(result[0].link);
                },
                error: function(){
                    console.log('Error:');
                }
            });
        }
    </script>
@endsection