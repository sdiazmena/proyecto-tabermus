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
            <div class= "row">
                <h3>Cambiar Historia de {{ $banda->nombre }}</h3>
                {!! Form::open(['url' => '/profile/banda/'.$banda->id.'/historia/update','method' => 'POST']) !!}
                    <div class="col-sm-12">
                        
                        {!! Form::textarea('historia', $banda->historia, ['class' => 'form-control', 'placeholder' => 'Historia de la banda...', 'value' => '{{$banda->historia}}']) !!}
                    </div>
                    <div class="col-xs-9">
                        {!! Form::submit('Actualizar Historia', ['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection