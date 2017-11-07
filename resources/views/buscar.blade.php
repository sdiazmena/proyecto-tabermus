@extends('layouts.prueba')

@section('content')
    <div class="col-sm-8 bloqueContenido">
        <br>
        <p class="titulo text-center"><img  src="{{ asset('img/titulos/busqueda.png') }}" style="width:350px; height: 90px"></p>
        <div>
            <div class="fondoContenido" id="contenidoMostrar">
                <div class="form-group">
                    <label for="palabraClave">Nombre:</label>
                    <input type="text" class="form-control" id="palabraClave" placeholder="Buscar..">
                </div>

                <select>
                    <option>Todo</option>
                    <option>Banda</option>
                    <option>Evento</option>
                </select>

                <button type="submit" class="btn btn-default">Buscar</button>
            </div>
            <div class="fondoContenido" id="resultadoBusqueda">
                <h3 id="tituloBusqueda"></h3>
            </div>
        </div>

    </div>

@endsection