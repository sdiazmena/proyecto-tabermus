@extends('layouts.prueba')

@section('content')
    <div class="col-sm-8 bloqueContenido">
        <br>
        <p class="titulo text-center"><img  src="{{ asset('img/titulos/filtrado.png') }}" style="width:350px; height: 90px"></p>
        <div>
            <div class="fondoContenido" id="contenidoMostrar">
                {!! Form::open(['route' => 'movie/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
                <div class="row">
                    {!! Form::label('region', 'Region:',['class' => 'col-sm-2 letraTitulo']) !!}
                    {!! Form::select('region', $regiones, null,['class' => 'col-sm-4','id'=>'region', 'placeholder' => 'Seleccione una región..','required']) !!}
                </div>
                <div class="row">
                    {!! Form::label('genero_id', 'Genero:',['class' => 'col-sm-2 letraTitulo']) !!}
                    {!! Form::select('generoSeleccionado', $generos, null,['class' => 'col-sm-3', 'placeholder' => 'Seleccione un Genero..']) !!}
                </div>
                <div class="row">
                    {!! Form::label('ciudad_id', 'Ciudad:',['class' => 'col-sm-2 letraTitulo']) !!}
                    {!! Form::select('ciudad', ['placeholder' => 'Seleccione una ciudad..'], null,['id'=>'ciudad','class' => 'col-sm-4','required']) !!}
                </div>
                <div class="row">
                    {!! Form::label('letra_id', 'Alfabeto:',['class' => 'col-sm-2 letraTitulo']) !!}
                    <select class="col-sm-2">
                        <option>Todo</option>
                        <option>A</option><option>B</option><option>C</option><option>D</option><option>E</option>
                        <option>F</option><option>G</option><option>H</option><option>I</option><option>J</option>
                        <option>K</option><option>L</option><option>M</option><option>N</option><option>O</option>
                        <option>P</option><option>Q</option><option>R</option><option>S</option><option>T</option>
                        <option>U</option><option>V</option><option>W</option><option>X</option><option>Y</option>
                        <option>Z</option><option>NUMERICO</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-xs-1">
                        <button type="submit" id="botonNacional" class="glyphicon glyphicon-search" onclick="actualizarNacional()"></button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputName2">Name</label>
                    <input type="text" class="form-control" name = "name" >
                </div>
                {!! Form::close() !!}
            </div>
            <div class="fondoContenido" id="resultadoBusqueda">
                <br>
                <table class="table table-condensed table-striped table-bordered">
                    <thead>
                    <tr class="letraTitulo">
                        <th>Nombre</th>
                        <th>Ciudad</th>
                        <th>Region</th>
                        <th>Genero</th>
                        <th>Lirica</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($movies as $movie)
                        <tr>
                            <td>{{ $movie->nombre }}</td>
                            <td>{{ $movie->id_ciudad }}</td>
                            <td>{{ $movie->id_ciudad }}</td>
                            <td>{{ $movie->id_genero }}</td>
                            <td>{{ $movie->id_lirica }}</td>
                            <td>
                                <a class="btn btn-danger btn-xs" href="{{ route('movie/destroy',['id' => $movie->id] )}}" >Ver</a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection