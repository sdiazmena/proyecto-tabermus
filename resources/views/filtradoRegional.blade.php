@extends('layouts.prueba')

@section('content')
    <div class="col-sm-8 bloqueContenido">
        <h1 class="well text-center">Filtrado</h1>
        <ul class="nav nav-tabs">
            <li class="nav-item"><a href="#">Tu Region</a></li>
            <li class="nav-item"><a href="filtradoNacional" id="nacional" >Nacional</a></li>
        </ul>
        <div>
            <div class="well" id="contenidoMostrar">
                <div class="row">
                    <div class="row">
                        <div>
                            {!! Form::label('region', 'Region',['class' => 'col-sm-1 control-label']) !!}
                            {!! Form::select('region', $regiones, null,['class' => 'col-sm-4','id'=>'region', 'placeholder' => 'Seleccione una región..','required']) !!}
                        </div>
                        <div>
                            {!! Form::label('ciudad_id', 'Ciudad',['class' => 'col-sm-1 control-label']) !!}
                            {!! Form::select('ciudad', ['class' => 'col-sm-4','placeholder' => 'Seleccione una ciudad..'], null,['id'=>'ciudad','required']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div>
                            {!! Form::label('genero_id', 'Genero',['class' => 'col-sm-1 control-label']) !!}
                            {!! Form::select('generoSeleccionado', $generos, null,['class' => 'col-sm-3', 'placeholder' => 'Seleccione un Genero..']) !!}
                        </div>
                        <div>
                            {!! Form::label('letra_id', 'Alfabeto',['class' => 'col-sm-1 control-label']) !!}
                            <select class="col-sm-1">
                                <option>A</option><option>B</option><option>C</option><option>D</option><option>E</option>
                                <option>F</option><option>G</option><option>H</option><option>I</option><option>J</option>
                                <option>K</option><option>L</option><option>M</option><option>N</option><option>O</option>
                                <option>P</option><option>Q</option><option>R</option><option>S</option><option>T</option>
                                <option>U</option><option>V</option><option>W</option><option>X</option><option>Y</option>
                                <option>Z</option><option>NUMERICO</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-1">
                            <button id="botonNacional" class="glyphicon glyphicon-search" onclick="actualizarNacional()"></button>
                        </div>
                    </div>


                </div>
            </div>
            <div class="well" id="resultadoBusqueda"></div>
        </div>

    </div>

@endsection