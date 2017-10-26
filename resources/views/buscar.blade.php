@extends('layouts.prueba')

@section('content')
    <div class="col-sm-8 bloqueContenido">
        <h1 class="well text-center">Busqueda:</h1>
        <div>
            <div class="well" id="contenidoMostrar">
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
            <div class="well" id="resultadoBusqueda">
                <h3 id="tituloBusqueda"></h3>
            </div>
        </div>

    </div>

@endsection