@extends('layouts.prueba')

@section('content')    
    <div class="col-sm-8 bloqueContenido">
            <h1 class="well text-center">{{ $banda->nombre }} Perfil</h1>
            <div class="well">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="/tabermus/public/profile/banda/{{$banda->id}}/edit">Perfil</a></li>
                    <li><a href="/tabermus/public/profile/banda/{{$banda->id}}/historia">Historia</a></li>
                    <li><a href="#">Musica y Discos</a></li>
                    <li><a href="#">Fechas</a></li>
                </ul>
                {!! Form::open(['url' => 'profile/banda/'.$banda->id,  'enctype' => 'multipart/form-data', 'files' => 'true','method' => 'PUT']) !!}
                {{csrf_field()}}
                <div class="col-sm-5">
                    <img src="http://localhost/tabermus/public/{{$banda->imagen}}" class="img-responsive" style="width:100%" alt="Image">
		            <div class='form-group'>
		                <label for='image'>Imagen: </label>
		                <input type="file" name="image"/>
		                <div class='text-danger'>{{$errors->first('image')}}</div>
		            </div>
                </div>


                <div>
                    
                        <fieldset>
                            
                                <div class="row">
                                    
                                    <div class="col-sm-3">
                                        {!! Form::label('nombre', 'Nombre') !!}
                                    </div>
                                    <div class="col-xs-9">
                                        {!! Form::text('nombre', $banda->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre','value' => '{{$banda->nombre}}']) !!}

                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    {!! Form::label('region', 'Region',['class' => 'col-sm-3 control-label']) !!}
                                    <div class="col-xs-9">                                        
                                        {!! Form::select('region', $regiones, null,['id'=>'region','class' => 'form-control', 'placeholder' => 'Seleccione una región..']) !!}
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
                                <br>
                                <div class="row">
                                    <label class="col-sm-3 control-label" for="generoSeleccionado">Genero:</label>
                                    <div class="col-xs-6">
                                        {!! Form::select('generoSeleccionado', $generos, null,['class' => 'form-control', 'placeholder' => 'Seleccione un Genero..']) !!}
                                    </div>
                                    <!--
                                    <div>
                                        <a id="agregarGenero" href="#">agregar</a>
                                    </div>-->

                                </div><!--
                                <div style="margin-left: 145px;">
                                    <table>
                                        <thead><tr>
                                            <th></th>
                                        </tr></thead>
                                        <tbody id="tabla-genero">
                                        </tbody>
                                    </table>
                                </div>-->
                                <br>
                                <div class="row">
                                    <label class="col-sm-3 control-label">Lirica:</label>
                                    <div class="col-xs-6">
                                        {!! Form::select('liricaSeleccionado', $liricas, null,['class' => 'form-control', 'placeholder' => 'Seleccione una lirica..']) !!}
                                    </div><!--
                                    <div>
                                        <a id="agregarlirica" href="#">agregar</a>
                                    </div>-->
                                </div>
                                <!--
                                <div style="margin-left: 145px;">
                                    <table>
                                        <thead><tr>
                                            <th></th>
                                        </tr></thead>
                                        <tbody id="tabla-lirica">
                                        </tbody>
                                    </table>
                                </div>-->

                                <br>
                                <div class="row">
                                    <label class="col-sm-3 control-label" for="Integrantes">Integrantes:</label>
                                 
                                        <div id="contenedor">
                                        <div class="added">
                                            
                                            <div class="col-xs-9">
                                                     <input type="text" name="Integrantes[]" id="Integrantes" placeholder="Integrantes"/>
                                            </div>
                                        </div>
                                        </div>
                                        <a id="agregarCampo" href="#">Agregar Campo</a>                                        

                                </div>
                           
                        </fieldset>
                        <br>
                    
                </div>

                <div class="container-fluid">
                        <div class="col-sm-12">
                            {!! Form::label('descripcion', '¿Quienes Somos?') !!}
                            {!! Form::textarea('descripcion', $banda->descripcion, ['class' => 'form-control', 'placeholder' => '¿Quienes Somos?', 'value' => '{{$banda->descripcion}}']) !!}
                        </div>
                    </div>
                <div class="text-center">
                        <br>
                        <h3>Links:</h3>
                        <br>
                </div>

                <div class="container-fluid">
                        <div>
                            <div class="col-sm-6">
                                <a class="pull-left">
                                    <img class="media-object" src="https://www.facebook.com/images/fb_icon_325x325.png" alt="..." height= "30px">
                                </a>
                                <div class="col-sm-6 input-group-sm">
                                {!! Form::text('facebook', $banda->facebook, ['class' => 'form-control', 'placeholder' => 'Facebook','value' => '{{$banda->facebook}}']) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <a class="pull-left">
                                    <img class="media-object" src="https://www.gstatic.com/images/icons/material/product/2x/youtube_64dp.png" alt="..." height= "30px">
                                </a>
                                <div class="col-sm-6 input-group-sm">
                                	{!! Form::text('youtube', $banda->youtube, ['class' => 'form-control', 'placeholder' => 'Youtube','value' => '{{$banda->youtube}}']) !!}
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <a class="pull-left">
                                <img class="media-object" src="https://instagram-brand.com/wp-content/themes/ig-branding/assets/images/ig-logo-email.png" alt="..." height= "30px">
                            </a>
                            <div class="col-sm-6 input-group-sm">
                                {!! Form::text('instagram', $banda->instagram, ['class' => 'form-control', 'placeholder' => 'Instagram','value'=>'{{$banda->instagram}}']) !!}
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <a class="pull-left">
                                <img class="media-object" src="https://lh3.googleusercontent.com/UrY7BAZ-XfXGpfkeWg0zCCeo-7ras4DCoRalC_WXXWTK9q5b0Iw7B0YQMsVxZaNB7DM=w300" alt="..." height= "30px">
                            </a>
                            <div class="col-sm-6 input-group-sm">
                                {!! Form::text('spotify', $banda->spotify, ['class' => 'form-control', 'placeholder' => 'Spotify','value'=>'$banda->spotify']) !!}
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <a class="pull-left">
                                <img class="media-object" src="http://www.espiritudeportivo.es/images/twitter-contacto.png" alt="..." height= "30px">
                            </a>
                            <div class="col-sm-6 input-group-sm">
                                {!! Form::text('twitter', $banda->twitter, ['class' => 'form-control', 'placeholder' => 'Twitter','value' => '{{$banda->twitter}}']) !!}
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://industriamusical.es/wp-content/uploads/2014/05/soundcloud-icon.png" alt="..." height= "30px">
                            </a>
                            <div class="col-sm-6 input-group-sm">
                                {!! Form::text('soundcloud', $banda->twitter, ['class' => 'form-control', 'placeholder' => 'SoundCloud','value' => '$banda->twitter']) !!}
                            </div>
                        </div>


                    </div>
                <br>
                
            </div>
            {!! Form::submit('Acrualizar Datos', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
    </div>
@endsection