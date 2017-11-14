@extends('layouts.prueba')

@section('content')
    @if ($status)
    <hr />
        <div class='titulo letraTitulo text-center' style = "text-align:center">
            {{$status}}
        </div>
    <hr />
    @endif
    <div class="col-sm-8 bloqueContenido">
        <br>
        <div class="fondoContenido">
            <h1 class="titulo letraTitulo text-center">{{ Auth::user()->name }} Perfil</h1>
            <?php
            $poe = 'https://graph.facebook.com/v2.8/';
            $google = 'https://lh6.googleusercontent.com';
            $pos = strpos(Auth::user()->avatar, $poe);
            $pos2 = strpos(Auth::user()->avatar, $google);
            ?>
            @if($pos === false && $pos2 === false)
                <img src="uploads/avatars/{{Auth::user()->avatar}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            @else
                <img src="{{Auth::user()->avatar}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">

            @endif
            <h3 class="letraTitulo">Opciones:</h3>
            <ul>
                @if($banda[0] != '0')
                    <li><a class="btn btn-action btn-lg" role="button" href="{{ url('/profile/banda/'.$banda1->id.'/edit') }}">Adminisitrar Perfil de {{$banda[0]}}</a></li>

                @else
                    <li><a class="btn btn-action btn-lg letraTitulo" role="button" href="{{ url('/profile/banda') }}">Agregar Banda</a></li>
                @endif
                <li><a class="btn btn-action btn-lg letraTitulo" role="button" href="{{url('/profile/user')}}">Editar Perfil</a></li>
            </ul>
        </div>

    </div>
@endsection
