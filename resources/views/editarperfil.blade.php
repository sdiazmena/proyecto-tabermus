@extends('layouts.prueba')

@section('content')
<br>
<br>
    <div class="col-sm-8 bloqueContenido">
    	<h1>{{ Auth::user()->name }} Editar Perfil</h1>
        @if(Auth::user()->password == '')
            <img src="{{Auth::user()->avatar}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
        @else
            <img src="{{ Auth::user()->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
        @endif
        <h3>Cambiar imagen de perfil</h3>
		<form method='post' action='{{url("/profile/user/updateAvatar")}}' enctype='multipart/form-data'>
			{{csrf_field()}}
			<div class='form-group'>
				<label for='image'>Imagen: </label>
				<input type="file" name="image" />
				<div class='text-danger'>{{$errors->first('image')}}</div>
			</div>
			<button type='submit' class='btn btn-primary'>Actualizar imagen de perfil</button>
		</form>
		<h3>Cambiar Datos de perfil</h3>
		{!! Form::open(['url' => 'profile/user/updateProfile','method' => 'POST']) !!}

		<div class="col-sm-6">
		    {!! Form::label('nombre', 'Nombre') !!}
		</div>
		<div class="col-xs-9">
		    {!! Form::text('nombre', Auth::user()->name, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required', 'value' => '{{Auth::user()->name}}']) !!}
		</div>
	<div class="col-xs-9">
    {!! Form::submit('Actualizar Datos', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    </div>


@endsection