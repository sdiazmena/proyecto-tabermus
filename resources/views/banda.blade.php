@extends('layouts.prueba')

@section('content') 
    <div class="col-sm-8 bloqueContenido">
        <h1 class="titulo text-center letraTitulo">Crear Perfil</h1>
        <div class="fondoContenido letraTitulo">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#">Perfil</a></li>
                
            </ul>
            <hr class="featurette-divider"> 
            <div class="row featurette">
                {!! Form::open(['action' => 'BandaController@store',  'enctype' => 'multipart/form-data', 'files' => 'true']) !!}
                    {{csrf_field()}}
                <div class="col-md-6">
                    
                        <div class="form-group">
                            {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('region', 'Region',['class' => 'col-sm-3 control-label']) !!}
                            {!! Form::select('region', $regiones, null,['id'=>'region','class' => 'form-control', 'placeholder' => 'Seleccione una región..','required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('ciudad_id', 'Ciudad') !!}
                            {!! Form::select('ciudad', ['placeholder' => 'Seleccione una ciudad..'], null,['id'=>'ciudad','class' => 'form-control','required']) !!}
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="generoSeleccionado">Genero:</label>
                            {!! Form::select('generoSeleccionado', $generos, null,['class' => 'form-control', 'placeholder' => 'Seleccione un Genero..']) !!}
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Lirica:</label>
                            {!! Form::select('liricaSeleccionado', $liricas, null,['class' => 'form-control', 'placeholder' => 'Seleccione una lirica..']) !!}
                        </div>
                        <div class="form-group">
                                {!! Form::label('integrantes', 'INTEGRANTES')!!}
                                
                                <fieldset id="fiel" class="letraPortada" >
                                    <input type="button" value="agregar" name="Integrantes[]" onclick="crear(this)" />
                                </fieldset>
                        </div>
                        <div class="form-group">
                            {!! Form::label('descripcion', '¿Quienes Somos?') !!}
                            {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => '¿Quienes Somos?', 'required']) !!}
                        </div>
                        <div class="text-center">
                            <br>
                            <h3>Links:</h3>
                            <br>
                        </div>
                        <div class="form-group">
                            <img class="media-object" src="https://www.facebook.com/images/fb_icon_325x325.png" alt="..." height= "30px">
                            {!! Form::text('facebook', null, ['class' => 'form-control', 'placeholder' => 'Facebook']) !!}
                        </div>
                        <div class="form-group">
                            <img class="media-object" src="https://www.gstatic.com/images/icons/material/product/2x/youtube_64dp.png" alt="..." height= "30px">
                            {!! Form::text('youtube', null, ['class' => 'form-control', 'placeholder' => 'Youtube']) !!}
                        </div>
                        <div class="form-group">
                            <img class="media-object" src="https://instagram-brand.com/wp-content/themes/ig-branding/assets/images/ig-logo-email.png" alt="..." height= "30px">
                            {!! Form::text('instagram', null, ['class' => 'form-control', 'placeholder' => 'Instagram']) !!}
                        </div>
                        <div class="form-group">
                            <img class="media-object" src="https://lh3.googleusercontent.com/UrY7BAZ-XfXGpfkeWg0zCCeo-7ras4DCoRalC_WXXWTK9q5b0Iw7B0YQMsVxZaNB7DM=w300" alt="..." height= "30px">
                            {!! Form::text('spotify', null, ['class' => 'form-control', 'placeholder' => 'Spotify']) !!}
                        </div>
                        <div class="form-group">
                            <img class="media-object" src="http://www.espiritudeportivo.es/images/twitter-contacto.png" alt="..." height= "30px">
                            {!! Form::text('twitter', null, ['class' => 'form-control', 'placeholder' => 'Twitter']) !!}
                        </div>
                        <div class="form-group">
                            <img class="media-object" src="http://industriamusical.es/wp-content/uploads/2014/05/soundcloud-icon.png" alt="..." height= "30px">
                            {!! Form::text('soundcloud', null, ['class' => 'form-control', 'placeholder' => 'SoundCloud']) !!}
                        </div>
                    
                </div>
                <div class="col-md-6">
                    <div class='form-group'>
                        <img src="https://gruposmedia.com/wp-content/plugins/ajax-search-pro/img/default.jpg" class="img-responsive" style="width:100%" alt="Image">
                        <label for='image'>IMAGEN </label>
                        <input type="file" name="image"/>
                        <div class='text-danger'>{{$errors->first('image')}}</div>
                    </div>
                </div>

            </div>  
                            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('scripts')
<script>
        num=0;
        function crear(obj) {
          
        fi = document.getElementById('fiel'); // 1
        contenedor = document.createElement('div'); // 2
        contenedor.id = 'div'+num; // 3
        fi.appendChild(contenedor); // 4
        
          ele = document.createElement('input'); // 5
          ele.type = 'text'; // 6
          ele.name = 'Integrantes'+num;
          ele.class = 'form-control'; // 6
          contenedor.appendChild(ele); // 7
          
          ele = document.createElement('input'); // 5
          ele.type = 'button'; // 6
          ele.value = 'Borrar'; // 8
          ele.name = 'div'+num; // 8
          ele.onclick = function () {borrar(this.name)} // 9
          contenedor.appendChild(ele); // 7
          num++;
        }
        function borrar(obj) {
          fi = document.getElementById('fiel'); // 1 
          fi.removeChild(document.getElementById(obj)); // 10
        }
</script>
@endsection
                
  