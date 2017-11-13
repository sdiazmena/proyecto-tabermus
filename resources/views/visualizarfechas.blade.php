@extends('layouts.prueba')
@section('content')
    <div class="col-sm-8 bloqueContenido">
        <h1 class="titulo letraTitulo text-center">{{ $banda->nombre }} Shows</h1>
        <div class="fondoContenido letraTitulo">
            <ul class="nav nav-tabs">
                <li ><a href="{{$rutaPerfil}}">Perfil</a></li>
                <li ><a href="{{$rutaHistoria}}">Historia</a></li>
                <li><a href="{{$rutaDiscos}}">Musica y Discos</a></li>
                <li class="active"><a href="{{$rutaFechas}}">Fechas</a></li>

            </ul>
            <h1 class="letraTitulo titulo">    Fechas de {{ $banda->nombre }}</h1>

            @if($shows)
                @foreach($shows as $show)
                    <div class="titulo">
                        <div class="row">
                            <div class="col-sm-1 letraTitulo">Nombre:</div>
                            <div class="col-sm-2 letraTexto">{{$show->title}}</div>
                            <div class="col-sm-1 letraTitulo">Region:</div>
                            <div class="col-sm-2 letraTexto">{{$show->id_region}}</div>
                            <div class="col-sm-1 letraTitulo">Ciudad:</div>
                            <div class="col-sm-2 letraTexto">{{$show->id_ciudad}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-1 letraTitulo">Inicio:</div>
                            <div class="col-sm-4 letraTexto">{{$show->start}}</div>
                            <div class="col-sm-1 letraTitulo">Termino:</div>
                            <div class="col-sm-4 letraTexto">{{$show->end}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 letraTitulo">Informacion:</div>
                            <div class="col-sm-6 letraTexto">{{$show->informacion}}</div>
                        </div>

                    </div>
                @endforeach
                @endif
        </div>
    </div>
@endsection
