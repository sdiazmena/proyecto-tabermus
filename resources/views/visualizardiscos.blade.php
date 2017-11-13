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
                @foreach ($discos as $disco)
                    <div class="row fondoContenido">
                        <div>
                            <div class="col-md-5 fondoContenido">
                                <img src="http://localhost/tabermus/public/{{$disco->caratula}}" class="img-responsive" style="width:100%" alt="Image">
                            </div>
                            <div class="col-md-7">
                                <div>
                                    <div class="row">
                                        <p><strong>Nombre: </strong>{{ $disco->nombre }}</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <strong>Año: </strong> {{ $disco->año }}
                                        </div>
                                        <div class="col-sm-4">
                                            <strong>Sello:</strong> {{ $disco->sello }}
                                        </div>
                                        <div class="col-sm-4">
                                            <strong>Tipo:</strong> {{ $disco->tipo }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <strong class="letraTitulo">Listado: </strong>
                                    <div><strong class="letraTexto col-md-offset-2">Track: </strong>
                                        <strong class="letraTexto col-md-offset-1">Titulo: </strong>
                                        <strong class="letraTexto col-md-offset-2">Duracion: </strong>
                                    </div>
                                    @foreach ($listacanciones as $listacancion)
                                        <?php $indice=1 ?>
                                        @if($disco->id == $listacancion->id_disco)
                                            @foreach($canciones as $cancion)
                                                @foreach($cancion as $can)
                                                    @if($listacancion->id_disco == $can->id_lista)
                                                        <div>
                                                            <strong class="letraTexto col-md-offset-2">{{$indice}}</strong>
                                                            <strong class="letraTexto col-md-offset-2">{{ $can->titulo }}</strong>
                                                            <!--<strong class="letraTexto col-md-offset-2">{{ $can->titulo }}</strong>-->
                                                            <?php $indice = $indice +1 ?>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                        </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h4 class="letraTexto">Actualmente la banda no ha registrado discos para ver</h4>
            @endif
        </div>
    </div>
@endsection
