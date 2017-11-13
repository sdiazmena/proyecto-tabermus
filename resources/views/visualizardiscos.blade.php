@extends('layouts.prueba')

@section('content')
    <div class="col-sm-8 bloqueContenido">
        <h1 class="fondoContenido letraTitulo text-center">{{ $banda->nombre }} Perfil</h1>
        <div class="fondoContenido letraTexto">
            <ul class="nav nav-tabs">
                <li><a href="{{$rutaPerfil}}">Perfil</a></li>
                <li><a href="{{$rutaHistoria}}">Historia</a></li>
                <li class="active"><a href="{{$rutaDiscos}}">Musica y Discos</a></li>
                <li><a href="{{$rutaFechas}}">Fechas</a></li>
            </ul>
            <h1 class="letraTitulo titulo">    Discografia de {{ $banda->nombre }}</h1>
            @if($discos)
                <h4 class="letraTexto">por extraña razon dice que el arreglo existe, siendo que no tiene nada</h4>
                @foreach ($discos as $disco)
                    <hr class="featurette-divider">
                    <div class="row featurette">
                  <div class="col-md-7">
                    <h1 class="featurette-heading">{{ $disco->nombre }} </h1>
                    <p class="lead">Año: {{ $disco->año }}</p>
                    <p class="lead">Sello: {{ $disco->sello }}</p>
                    <p class="lead">Tipo: {{ $disco->tipo }}</p>
                    <h4 class="featurette-heading">Canciones: </h4>
                    @foreach ($listacanciones as $listacancion)
                        @if($disco->id == $listacancion->id_disco)
                            @foreach($canciones as $cancion)
                                @foreach($cancion as $can)
                                @if($listacancion->id_disco == $can->id_lista)
                                    <p class="lead">{{ $can->titulo }}</p>
                                @endif
                                @endforeach
                            @endforeach
                        @endif
                    @endforeach
                  </div>
                    <div class="col-md-5 ">
                        <img src="http://localhost/tabermus/public/{{$disco->caratula}}" class="img-responsive" style="width:100%" alt="Image">
                    </div>
                </div>
                @endforeach
            @else
                <h4 class="letraTexto">Actualmente la banda no ha registrado discos para ver</h4>
            @endif
        </div>
    </div>
@endsection
