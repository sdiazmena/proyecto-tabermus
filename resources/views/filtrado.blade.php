@extends('layouts.prueba')

@section('content')
    <div class="col-sm-8 bloqueContenido">
        <br>
        <p class="titulo text-center"><img  src="{{ asset('img/titulos/filtrado.png') }}" style="width:350px; height: 90px"></p>
        <div>
            <div class="fondoContenido" id="contenidoMostrar">
                {!! Form::open(['route' => 'filtrado/resultado', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
                <div class="row">
                    {!! Form::label('region', 'Region:',['class' => 'col-sm-2 letraTitulo']) !!}
                    {!! Form::select('region', $regiones, null,['class' => 'col-sm-4','id'=>'region', 'placeholder' => 'Seleccione una región..','required']) !!}
                </div>
                <div class="row">
                    {!! Form::label('genero', 'Genero:',['class' => 'col-sm-2 letraTitulo']) !!}
                    {!! Form::select('genero', $generos, null,['class' => 'col-sm-3', 'placeholder' => 'Seleccione un Genero..']) !!}
                </div>
                <div class="row">
                    {!! Form::label('ciudad', 'Ciudad:',['class' => 'col-sm-2 letraTitulo']) !!}
                    {!! Form::select('ciudad', ['placeholder' => 'Seleccione una ciudad..'], null,['id'=>'ciudad','class' => 'col-sm-4','required']) !!}
                </div>
                <div class="row">
                    {!! Form::label('letra_id', 'Alfabeto:',['class' => 'col-sm-2 letraTitulo']) !!}
                    <select class="col-sm-2" name="letra">
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
                        <button type="submit" class="glyphicon glyphicon-search"></button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="fondoContenido" id="resultadoBusqueda">
                <table class="table table-condensed table-striped table-bordered">
                    <thead>
                    <tr class="letraTitulo">
                        <th>Nombre</th>
                        <th>Region</th>
                        <th>Ciudad</th>
                        <th>Lirica</th>
                        <th>Genero</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bandas as $banda)
                        <tr>
                            <td>{{ $banda->nombre }}</td>
                            <td>{{ $banda->id_ciudad }}</td>
                            <td>{{ $banda->id_ciudad }}</td>
                            <td>{{ $banda->id_lirica }}</td>
                            <td>{{ $banda->id_genero }}</td>
                            <td>
<<<<<<< HEAD
                                <a class="btn btn-danger btn-xs" href="{{ route('buscar/banda',['id' => $dato->id] )}}" >Ver</a>
=======
                                <a class="btn btn-danger btn-xs" href="{{ route('buscar/banda',['id' => $banda->id] )}}" >Ver</a>
>>>>>>> 8c6663f9165c3884d06f2eb12f85d0a073a6713a
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>


@endsection