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
        <h1 class="titulo text-center letraTitulo">{{ $banda->nombre }} Perfil</h1>
        <div class="fondoContenido letraTitulo">
            <ul class="nav nav-tabs">
                <li class="active"><a href="{{$rutaPerfil}}">Perfil</a></li>
                <li><a href="{{$rutaHistoria}}">Historia</a></li>
                <li><a href="{{$rutaDiscos}}">Musica y Discos</a></li>
                <li><a href="{{$rutaFechas}}">Fechas</a></li>
            </ul>
            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-6">
                    <h1 class="titulo letraTitulo">{{$banda->nombre}} </h1>
                    <h4 class="letraTexto"><strong>Region:</strong> {{ $region->nombre }}</h4>
                    <h4 class="letraTexto"><strong>Ciudad:</strong> {{ $ciudad->nombre }}</h4>
                    <h4 class="letraTexto"><strong>Genero:</strong> {{ $genero->nombre }}</h4>
                    <h4 class="letraTexto"><strong>Lirica:</strong> {{ $lirica->nombre }}</h4>
                    <h4 class="letraTexto"><strong>¿Quienes Somos?:</strong> {{ $banda->descripcion}}</h4>

                    <?php $redesSociales = 0?>

                    @if($banda->facebook)
                        <p class="lead"><a href="https://{{$banda->facebook}}"><img class="media-object" src="https://www.facebook.com/images/fb_icon_325x325.png" alt="..." height= "30px"></a></p>
                        <?php $redesSociales = $redesSociales +1?>
                    @endif

                    @if($banda->youtube)
                        <p class="lead"><a href="https://{{$banda->youtube}}"><img class="media-object" src="https://www.gstatic.com/images/icons/material/product/2x/youtube_64dp.png" alt="..." height= "30px"></a></p>
                        <?php $redesSociales = $redesSociales +1?>
                    @endif

                    @if($banda->instagram)
                        <p class="lead"><a href="https://{{$banda->instagram}}"><img class="media-object" src="https://instagram-brand.com/wp-content/themes/ig-branding/assets/images/ig-logo-email.png" alt="..." height= "30px"></a></p>
                        <?php $redesSociales = $redesSociales +1?>
                    @endif

                    @if($banda->spotify)
                        <p class="lead"><a href="https://{{$banda->spotify}}"><img class="media-object" src="https://lh3.googleusercontent.com/UrY7BAZ-XfXGpfkeWg0zCCeo-7ras4DCoRalC_WXXWTK9q5b0Iw7B0YQMsVxZaNB7DM=w300" alt="..." height= "30px"></a></p>
                        <?php $redesSociales = $redesSociales +1?>
                    @endif

                    @if($banda->twitter)
                        <p class="lead"><a href="https://{{$banda->twitter}}"><img class="media-object" src="http://www.espiritudeportivo.es/images/twitter-contacto.png" alt="..." height= "30px"></a></p>
                        <?php $redesSociales = $redesSociales +1?>
                    @endif

                    @if($banda->soundcloud)
                        <p class="lead"><a href="https://{{$banda->soundcloud}}"><img class="media-object" src="http://industriamusical.es/wp-content/uploads/2014/05/soundcloud-icon.png" alt="..." height= "30px"></a></p>
                        <?php $redesSociales = $redesSociales +1?>
                    @endif

                    @if($redesSociales == 0)
                        <h4 class="letraTexto"><strong>Redes Sociales:</strong> Actualmente no registrados en esta banda</h4>
                    @endif
                </div>
                <div class="col-md-6">
                    <br>
                    <img src="http://localhost/tabermus/public/{{$banda->imagen}}" class="img-responsive fondoContenido" style="width:100%" alt="Image">
                </div>
            </div>
            @if($editable == 1)
            <a id="editar"  class="btn btn-danger">Editar</a>
            @endif
            <hr class="featurette-divider">
            {!! Form::open(['url' => 'profile/banda/'.$banda->id,  'enctype' => 'multipart/form-data', 'files' => 'true','method' => 'PUT']) !!}
            {{csrf_field()}}
            <div id="responsive-modal" class="modal fade" tabindex="-1" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content fondoContenido letraTitulo">
                        <div class="modal-header">
                            <h4 color="black" class="titulo">Editar Perfil Banda</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">                                
                                {{ Form::label('nombre', 'NOMBRE:')}}
                                {!! Form::text('nombre', $banda->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre','value' => '{{$banda->nombre}}']) !!}
                            </div>
                            <div class='form-group'>
                                <label for='image'>IMAGEN </label>
                                <input type="file" name="image"/>
                                <div class='text-danger'>{{$errors->first('image')}}</div>
                            </div>
                            <div class="form-group">
                                
                                {!! Form::label('region', 'Region',['class' => 'col-sm-3 control-label']) !!}
                                <h4>{{ $region->nombre }} </h4>
                                {!! Form::select('region', $regiones, null,['id'=>'region','class' => 'form-control', 'placeholder' => 'Seleccione una región..']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('ciudad_id', 'Ciudad',['class' => 'col-sm-3 control-label']) !!}  
                                <h4>{{ $ciudad->nombre }} </h4>
                                {!! Form::select('ciudad', ['placeholder' => 'Seleccione una ciudad..'], null,['id'=>'ciudad','class' => 'form-control','value' => '{{$banda->id_ciudad}}']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('generoSeleccionado', 'Genero',['class' => 'col-sm-3 control-label']) !!}  
                                <h4 >{{ $genero->nombre }} </h4>
                                {!! Form::select('generoSeleccionado', $generos, null,['class' => 'form-control', 'placeholder' => 'Seleccione un Genero..','value' => '{{$banda->id_genero}}']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('liricaSeleccionado', 'Lirica',['class' => 'col-sm-3 control-label']) !!}  
                                <h4 >{{ $lirica->nombre }} </h4>
                                {!! Form::select('liricaSeleccionado', $liricas, null,['class' => 'form-control', 'placeholder' => 'Seleccione una lirica..','value' => '{{$banda->id_lirica}}']) !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('integrantes', 'Integrantes')}}
                                <script type="text/javascript">
                                    var num=0;
                                </script>
                                @foreach($integrantes as $integrante)
                                <fieldset id="fiel2" class="letraPortada">
                                    <script type="text/javascript">
                                        <?php
                                            $code_array = json_encode($integrante);
                                        ?>
                                        var array_code = <?php echo $code_array; ?>;
                                        
                                        fi = document.getElementById('fiel2'); // 1
                                        contenedor = document.createElement('div'); // 2
                                        contenedor.id = 'div'+num; // 3
                                        fi.appendChild(contenedor); // 4
                                         
                                        ele = document.createElement('input'); // 5
                                        ele.type = 'text'; // 6
                                        ele.name = 'integrantes'+num;
                                        ele.class = 'form-control';
                                        ele.value = array_code.nombre;
                                        ele.placeholder = array_code.nombre;; // 6
                                        contenedor.appendChild(ele); // 7
                                          
                                        ele = document.createElement('input'); // 5
                                        ele.type = 'button'; // 6
                                        ele.value = 'Borrar'; // 8
                                        ele.name = 'div'+num; // 8
                                        ele.onclick = function () {borrar(this.name)} // 9
                                        contenedor.appendChild(ele); 
                                        function borrar(obj) {
                                            fi = document.getElementById('fiel2'); // 1 
                                            fi.removeChild(document.getElementById(obj)); // 10
                                        }
                                        num++;
                                    </script>
                                </fieldset>
                                @endforeach
                                <fieldset id="fiel" class="letraPortada" >
                                    <input type="button" value="agregar" name="integrante[]" onclick="crear(this)" />
                                </fieldset>
                            </div>
                            <div class="form-group">
                                {!! Form::label('descripcion', '¿Quienes Somos?') !!}
                                {!! Form::textarea('descripcion', $banda->descripcion, ['class' => 'form-control', 'placeholder' => '¿Quienes Somos?', 'value' => '{{$banda->descripcion}}']) !!}
                            </div>
                            <div class="form-group">
                                <img class="media-object" src="https://www.facebook.com/images/fb_icon_325x325.png" alt="..." height= "30px">
                                {!! Form::text('facebook', $banda->facebook, ['class' => 'form-control', 'placeholder' => 'www.facebook.com/ejemplo','value' => '{{$banda->facebook}}']) !!}
                            </div>
                            <div class="form-group">
                                <img class="media-object" src="https://www.gstatic.com/images/icons/material/product/2x/youtube_64dp.png" alt="..." height= "30px">
                                {!! Form::text('youtube', $banda->youtube, ['class' => 'form-control', 'placeholder' => 'www.youtube.com/ejemplo','value' => '{{$banda->youtube}}']) !!}
                            </div>
                            <div class="form-group">
                                <img class="media-object" src="https://instagram-brand.com/wp-content/themes/ig-branding/assets/images/ig-logo-email.png" alt="..." height= "30px">
                                {!! Form::text('instagram', $banda->instagram, ['class' => 'form-control', 'placeholder' => 'www.instagram.com/ejemplo','value'=>'{{$banda->instagram}}']) !!}
                            </div>
                            <div class="form-group">
                                <img class="media-object" src="https://lh3.googleusercontent.com/UrY7BAZ-XfXGpfkeWg0zCCeo-7ras4DCoRalC_WXXWTK9q5b0Iw7B0YQMsVxZaNB7DM=w300" alt="..." height= "30px">
                                {!! Form::text('spotify', $banda->spotify, ['class' => 'form-control', 'placeholder' => 'www.spotify.com/ejemplo','value'=>'$banda->spotify']) !!}
                            </div>
                            <div class="form-group">
                                <img class="media-object" src="http://www.espiritudeportivo.es/images/twitter-contacto.png" alt="..." height= "30px">
                                {!! Form::text('twitter', $banda->twitter, ['class' => 'form-control', 'placeholder' => 'www.twitter.com/ejemplo','value' => '{{$banda->twitter}}']) !!}
                            </div>
                            <div class="form-group">
                                <img class="media-object" src="http://industriamusical.es/wp-content/uploads/2014/05/soundcloud-icon.png" alt="..." height= "30px">
                                {!! Form::text('soundcloud', $banda->twitter, ['class' => 'form-control', 'placeholder' => 'www.soundcloud.com/ejemplo','value' => '$banda->twitter']) !!}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dafault letraPortada" data-dismiss="modal">CANCELAR</button>
                            {!! Form::submit('Actualizar', ['class' => 'btn btn-success']) !!}
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    $(document).ready(function() {

        $('#editar').on('click', function(){
            $('#responsive-modal').modal('show');
        });
    });
        num1=0;
        function crear(obj) {
          
          fi = document.getElementById('fiel'); // 1
          contenedor = document.createElement('div'); // 2
          contenedor.id = 'div'+num1; // 3
          fi.appendChild(contenedor); // 4
         
          ele = document.createElement('input'); // 5
          ele.type = 'text'; // 6
          ele.name = 'integrante'+num1;
          ele.class = 'form-control'; // 6
          contenedor.appendChild(ele); // 7
          
          ele = document.createElement('input'); // 5
          ele.type = 'button'; // 6
          ele.value = 'Borrar'; // 8
          ele.name = 'div'+num1; // 8
          ele.onclick = function () {borrar1(this.name)} // 9
          contenedor.appendChild(ele); // 7
          num1++;
        }
        function borrar1(obj) {
          fi = document.getElementById('fiel'); // 1 
          fi.removeChild(document.getElementById(obj)); // 10
        }
    </script>
@endsection