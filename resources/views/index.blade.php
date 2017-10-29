@extends('layouts.prueba')
@section('content')

    {!! Form::open(['action' => 'BandaController@store',  'enctype' => 'multipart/form-data', 'files' => 'true']) !!}
    {{csrf_field()}}

    <div class="row">
        {!! Form::label('region', 'Region',['class' => 'col-sm-3 control-label']) !!}
        <div class="col-xs-9">
            {!! Form::select('region', $regiones, null,['id'=>'region','class' => 'form-control', 'placeholder' => 'Seleccione una región..','required']) !!}
        </div>
        <br>
        <br>
        <br>

        <div class="col-sm-3">
            {!! Form::label('ciudad_id', 'Ciudad') !!}
        </div>
        <div class="col-xs-9 ">

            {!! Form::select('ciudad', ['placeholder' => 'Seleccione una ciudad..'], null,['id'=>'ciudad','class' => 'form-control','required']) !!}


        </div>
    </div>

@endsection
