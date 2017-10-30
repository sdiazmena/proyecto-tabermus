@extends('layouts.prueba')

@section('content')
<br>
<br>
    @if (Session::has('status'))
    <hr />
        <div class='text-success'>
            {{Session::get('status')}}
        </div>
    <hr />
    @endif
    <div class="col-sm-8 bloqueContenido">
        <h1>{{ Auth::user()->name }} Perfil</h1>
        @if(Auth::user()->password == '')
            <img src="uploads/avatars/{{Auth::user()->avatar}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
        @else
            <img src="uploads/avatars/{{Auth::user()->avatar}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">

        @endif    
        <h3>Opciones:</h3>
        <ul>
        @if($banda[0] != '0')
            <li><a class="btn btn-action btn-lg" role="button" href="{{ url('/profile/banda/'.$banda1->id.'/edit') }}">Adminisitrar Perfil de {{$banda[0]}}</a></li>

        @else
            <li><a class="btn btn-action btn-lg" role="button" href="{{ url('/profile/banda') }}">Agregar Banda</a></li>
        @endif
        <li><a class="btn btn-action btn-lg" role="button" href="{{url('/profile/user')}}">Editar Perfil</a></li>
        </ul>
    </div>
@endsection
