@extends('layouts.prueba')

@section('content')    
    <div class="col-sm-8 bloqueContenido">
        <h1 class="well text-center">{{ $banda->nombre }} Perfil</h1>
        <div class="well">
            <ul class="nav nav-tabs">
                <li><a href="/tabermus/public/profile/banda/{{$banda->id}}/edit">Perfil</a></li>
                <li class="active"><a href="/tabermus/public/profile/banda/{{$banda->id}}/historia">Historia</a></li>
                <li><a href="/tabermus/public/profile/banda/{{$banda->id}}/discos">Musica y Discos</a></li>
                <li><a href="/tabermus/public/profile/banda/{{$banda->id}}/fechas">Fechas</a></li>
            </ul>

        </div>
    </div>
@endsection