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
                    {!! Form::select('region', $regiones, ['class' => 'col-sm-4','id'=>'region', 'placeholder' => 'Seleccione una región..','required']) !!}
                </div>
                <div class="row">
                    {!! Form::label('genero', 'Genero:',['class' => 'col-sm-2 letraTitulo']) !!}
                    {!! Form::select('genero', $generos, null,['class' => 'col-sm-3', 'placeholder' => 'Seleccione un Genero..']) !!}
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
                    {!! Form::label('letra_id', 'Ordenar por:',['class' => 'col-sm-2 letraTitulo']) !!}
                    <select class="col-sm-2" name="orden">
                        <option>Alfabeticamente</option>
                        <option>Ciudad</option>
                        <option>Genero</option>
                        <option>Lirica</option>
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
                <table class="table table-condensed table-bordered">
                    <?php $conteo = 0?>
                    <thead>
                    <tr class="letraTitulo">
                        <th>Nombre</th>
                        <th>Ciudad</th>
                        <th>Region</th>
                        <th>Lirica</th>
                        <th>Genero</th>
                    </tr>
                    </thead>
                    <tbody class="letraTexto">
                    @foreach($bandas as $banda)
                        <tr>
                                @foreach($ciudadestraductor as $ciudad)
                                    @if($ciudad->id == $banda->id_ciudad)
                                    @if($ciudad->id_region == $regionactual)
                                        <td>{{ $banda->nombre }}</td>
                                        @foreach($ciudadestraductor as $ciudad)
                                            @if($ciudad->id == $banda->id_ciudad)
                                                <td>{{ $ciudad->nombre }}</td>
                                                @foreach($regionestraductor as $region)
                                                    @if($region->id == $ciudad->id_region)
                                                        <td>{{ $region->nombre }}</td>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                        @foreach($liricastraductor as $lirica)
                                            @if($lirica->id == $banda->id_lirica)
                                                <td>{{ $lirica->nombre }}</td>
                                            @endif
                                        @endforeach
                                        @foreach($generostraductor as $genero)
                                            @if($genero->id == $banda->id_genero)
                                                <td>{{ $genero->nombre }}</td>
                                            @endif
                                            <?php $conteo = 1?>
                                        @endforeach
                                        <td>
                                            <a class="btn btn-danger btn-xs" href="{{ route('banda/ver',['id' => $banda->id] )}}" >Ver</a>
                                        </td>
                                    @endif
                                        @if('todo' == $regionactual)
                                            <td>{{ $banda->nombre }}</td>
                                            @foreach($ciudadestraductor as $ciudad)
                                                @if($ciudad->id == $banda->id_ciudad)
                                                    <td>{{ $ciudad->nombre }}</td>
                                                    @foreach($regionestraductor as $region)
                                                        @if($region->id == $ciudad->id_region)
                                                            <td>{{ $region->nombre }}</td>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                            @foreach($liricastraductor as $lirica)
                                                @if($lirica->id == $banda->id_lirica)
                                                    <td>{{ $lirica->nombre }}</td>
                                                @endif
                                            @endforeach
                                            @foreach($generostraductor as $genero)
                                                @if($genero->id == $banda->id_genero)
                                                    <td>{{ $genero->nombre }}</td>
                                                @endif
                                                <?php $conteo = 1?>
                                            @endforeach
                                            <td>
                                                <a class="btn btn-danger btn-xs" href="{{ route('banda/ver',['id' => $banda->id] )}}" >Ver</a>
                                            </td>
                                        @endif
                                    @endif
                                @endforeach




                        </tr>

                    @endforeach
                    </tbody>
                    @if($conteo == 0)
                        <h4 class="letraTitulo">No se registran resultados para este filtrado</h4>
                        @endif
                </table>
            </div>
        </div>

    </div>


@endsection