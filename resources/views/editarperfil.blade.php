@extends('layouts.prueba')

@section('content')
<br>
<br>
    <div class="col-sm-8 bloqueContenido">
    	<h1>{{ Auth::user()->name }} Editar Perfil</h1>
        @if(Auth::user()->password == '')
            <img src="{{Auth::user()->avatar}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
        @else
            <img src="uploads/avatars/{{ Auth::user()->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
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
    </div>


@endsection