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
			<h1 class="titulo letraTitulo"> Editar Perfil: {{ Auth::user()->name }}</h1>
        	<div class="row">
				<div>
                    <?php
                    $poe = 'https://graph.facebook.com/v2.8/';
                    $google = 'https://lh6.googleusercontent.com';
                    $pos = strpos(Auth::user()->avatar, $poe);
                    $pos2 = strpos(Auth::user()->avatar, $google);
                    ?>
					@if($pos === false && $pos2 === false)
						<img src="/tabermus/public/uploads/avatars/{{Auth::user()->avatar}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px; margin-top: 20px;margin-left: 40px">
					@else
						<img src="{{Auth::user()->avatar}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
					@endif
				</div>
				<div>
					<h3 class="letraTitulo">Cambiar imagen de perfil</h3>
					<form method='post' action='{{url("/profile/user/updateAvatar")}}' enctype='multipart/form-data'>
						{{csrf_field()}}
						<div class='form-group letraTitulo'>
							<label for='image'>Imagen: </label>
							<input type="file" name="image" />
							<div class='text-danger'>{{$errors->first('image')}}</div>
						</div>
						<button type='submit' class='btn btn-primary'>Actualizar imagen de perfil</button>
					</form>
					<h3 class="letraTitulo col-md-offset-3">Cambiar Datos de perfil</h3>
					{!! Form::open(['url' => 'profile/user/updateProfile','method' => 'POST']) !!}
					<div class="row">
						<div class="row">
							<div class="col-sm-1 col-md-offset-3 letraTitulo">
								{!! Form::label('nombre', 'Nombre:') !!}
							</div>
							<div class="col-xs-4">
								{!! Form::text('nombre', Auth::user()->name, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required', 'value' => '{{Auth::user()->name}}']) !!}
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2 col-md-offset-3">
								{!! Form::submit('Actualizar Datos', ['class' => 'btn btn-primary']) !!}
							</div>
						</div>
					</div>
					{!! Form::close() !!}
				</div>
			</div>


		</div>
    </div>
@endsection