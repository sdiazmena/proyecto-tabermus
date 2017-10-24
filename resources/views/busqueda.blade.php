@extends('layouts.prueba')

@section('content')  
<div class="container-fluid">
    <div class="col-sm-8 bloqueContenido">
        <h1 class="well text-center">Busqueda</h1>
        <ul class="nav nav-tabs">
            <li class="nav-item"><a href="#" id="tuRegion">Tu Region</a></li>
            <li class="nav-item"><a href="#" id="nacional">Nacional</a></li>
        </ul>
        <div>
            <div class="well" id="contenidoMostrar"></div>
            <div class="well" id="resultadoBusqueda"></div>
        </div>

    </div>


@endsection