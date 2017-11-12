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
                        <!--<option>Todo</option>-->
                        <option>Banda</option>
                        <!--<option>Evento</option>-->
                    </select>
                    <button type="submit" class="btn btn-default col-md-offset-2">Buscar</button>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="fondoContenido" id="resultadoBusqueda">
                <h3 class="letraTitulo">Resultado para:</h3>
                <h3 id="tituloBusqueda" class="letraTitulo"></h3>
            </div>
        </div>

    </div>

@endsection