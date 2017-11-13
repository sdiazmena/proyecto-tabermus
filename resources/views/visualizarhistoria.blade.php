@extends('layouts.prueba')

@section('content')    
    @if (Session::has('status'))
    <hr />
        <div class='text-success' style = "text-align:center">
            {{Session::get('status')}}
        </div>
    <hr />
    @endif
    <div class="col-sm-8 bloqueContenido">
        <h1 class="titulo letraTitulo text-center">{{ $banda->nombre }} Perfil</h1>
        <div class="fondoContenido">
            <ul class="nav nav-tabs">
                <li ><a href="{{$rutaPerfil}}">Perfil</a></li>
                <li class="active"><a href="{{$rutaHistoria}}">Historia</a></li>
                <li><a href="{{$rutaDiscos}}">Musica y Discos</a></li>
                <li><a href="{{$rutaFechas}}">Fechas</a></li>
            </ul>
            <h1 class="letraTitulo titulo">    Historia de {{ $banda->nombre }}</h1>
            @if($banda->historia)
                <p>{{ $banda->historia}}</p>
                @else
            <h4 class="letraTexto">Actualmente la banda no ha registrado historia</h4>
                @endif
        </div>
    </div>
@endsection
