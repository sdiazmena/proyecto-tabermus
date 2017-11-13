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
                                <a class="btn btn-danger btn-xs" href="{{ route('banda/ver',['id' => $dato->id] )}}" >Ver</a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection