@extends('layouts.prueba')

@section('content')
    <div class="col-sm-8 bloqueContenido">
        <h1 class="well text-center">Filtrado</h1>
        <ul class="nav nav-tabs">
            <li class="nav-item"><a href="#" id="tuRegion" onclick="cargaContenidoRegion()">Tu Region</a></li>
            <li class="nav-item"><a href="#" id="nacional" onclick="cargaContenidoNacional()">Nacional</a></li>
        </ul>
        <div>
            <div class="well" id="contenidoMostrar">aaaa</div>
            <div class="well" id="resultadoBusqueda">bssss</div>
        </div>

    </div>

@endsection