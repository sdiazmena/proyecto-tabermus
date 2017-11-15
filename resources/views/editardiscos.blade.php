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
        <h1 class="fondoContenido letraTitulo text-center">{{ $banda->nombre }} Perfil</h1>
        <div class="fondoContenido letraTexto">
            <ul class="nav nav-tabs">
                <li><a href="{{$rutaPerfil}}">Perfil</a></li>
                <li><a href="{{$rutaHistoria}}">Historia</a></li>
                <li class="active"><a href="{{$rutaDiscos}}">Musica y Discos</a></li>
                <li><a href="{{$rutaFechas}}">Fechas</a></li>
            </ul>
            @if($editable == 1)
            <hr class="featurette-divider">
            <div class='text-danger'>{{$errors->first('image')}}</div>
            
            <a id="agregar"  class="btn btn-danger">Agregar Nuevo Disco</a>
            @endif
            @foreach ($discos as $disco)
                <hr class="featurette-divider">

                <div class="row featurette">
                  <div class="col-md-7">
                    <h1 class="featurette-heading">{{ $disco->nombre }} </h1>
                    <p class="lead">Año: {{ $disco->año }}</p>
                    <p class="lead">Sello: {{ $disco->sello }}</p>
                    <p class="lead">Tipo: {{ $disco->tipo }}</p>
                    <h4 class="featurette-heading">Canciones: </h4>
                    @foreach ($listacanciones as $listacancion)
                        @if($disco->id == $listacancion->id_disco)
                            @foreach($canciones as $cancion)
                                @foreach($cancion as $can)
                                @if($listacancion->id_disco == $can->id_lista)
                                    <p class="lead">{{ $can->titulo }}</p>
                                @endif
                                @endforeach
                            @endforeach
                        @endif
                    @endforeach
                  </div>
                    <div class="col-md-5 ">
                        <img src="http://localhost/tabermus/public/{{$disco->caratula}}" class="img-responsive" style="width:100%" alt="Image">
                    </div>
                </div>
                

            @endforeach
            <a id="editar"  class="btn btn-danger">Editar Discos</a>
             {{ Form::open(['url' => '/profile/banda/'.$banda->id.'/discos/update', 'method' => 'POST', 'role' => 'form','files'=>'true'])}}
            <div id="responsive-modal" class="modal fade letraTitulo" tabindex="-1" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content fondoContenido">
                        <div class="modal-header">
                            <h4>Agregar Nuevo Disco</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" name="id_banda" value= "{{$banda->id}}">
                                {{ Form::label('nombre', 'NOMBRE DISCO')}}
                                {{ Form::text('nombre', null,['class' => 'form-control']) }}
                            </div>
                            <div class='form-group'>
                                <label for='image'>IMAGEN </label>
                                <input type="file" name="image"/>
                                <div class='text-danger'>{{$errors->first('image')}}</div>
                            </div>
                            <div class="form-group">
                                
                                {{ Form::label('año', 'AÑO')}}
                                <select name="año" class="form-control" >
                                    <?php
                                        for ($i=1990; $i<=2018; $i++) {
                                           echo "<option value='$i'>$i</option>";
                                        }  
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                {{ Form::label('sello', 'SELLO')}}
                                {{ Form::text('sello', null,['id'=>'time_start','class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('tipo', 'TIPO')}}
                                {{ Form::text('tipo', null,['id'=>'date_end','class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('canciones', 'CANCIONES')}}
                                
                                <fieldset id="fiel" class="letraPortada" >
                                    <input type="button" value="agregar" name="canciones[]" onclick="crear(this)" />
                                </fieldset>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dafault letraPortada" data-dismiss="modal">CANCELAR</button>
                            {!! Form::submit('GUARDAR', ['class' => 'btn btn-success']) !!}
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
 
            <div id="selectDisco-modal" class="modal fade letraTitulo" tabindex="-1" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content fondoContenido">
                        <div class="modal-header">
                            <h4>Seleccionar Disco</h4>
                        </div>
                        <div class="modal-body">
                            <h1 class="featurette-heading">Discos: </h1>
                            
                                <div class="form-group">                                
                                    
                                   <select class = "form-control" name="elejir_comida" onchange="mostrarValor(this);"> 
                                    @foreach ($discos as $disco)
                                        <option value="{{$disco->id}}">{{$disco->nombre}}</option>
                                    @endforeach
                                </select>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dafault letraPortada" data-dismiss="modal">CANCELAR</button>
                        </div>
                    </div>
                </div>
            </div>
             {{ Form::open(['url' => '/profile/banda/'.$banda->id.'/discos/editar', 'method' => 'POST', 'role' => 'form','files'=>'true'])}}
            <div id="selectDisco2-modal" class="modal fade letraTitulo" tabindex="-1" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content fondoContenido">
                        <div class="modal-header">
                            <h4>Editar Disco </h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                
                                {{ Form::label('nombre', 'NOMBRE DISCO')}}
                                {{ Form::text('nombre', old('nombre'),[' class' => 'form-control']) }}
                            </div>
                            <div class='form-group'>
                                <label for='image'>IMAGEN </label>
                                <input type="file" name="image"/>
                                <div class='text-danger'>{{$errors->first('image')}}</div>
                            </div>
                            <div class="form-group">
                                
                                {{ Form::label('año', 'AÑO')}}
                                {{ Form::text('año', old('año'),['class' => 'form-control', 'readonly' => 'true']) }}
                                <select name="año" class="form-control" >
                                    <?php
                                        for ($i=1990; $i<=2018; $i++) {
                                           echo "<option value='$i'>$i</option>";
                                        }  
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                {{ Form::label('sello', 'SELLO')}}
                                {{ Form::text('sello', old('sello'),['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('tipo', 'TIPO')}}
                                {{ Form::text('tipo', old('tipo'),['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('canciones', 'CANCIONES')}}
                                
                                <fieldset id="fiel2" class="letraPortada" >
                                    <input type="button" value="agregar" name="canciones[]" onclick="crear(this)" />
                                </fieldset>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dafault letraPortada" data-dismiss="modal">CANCELAR</button>
                            {!! Form::submit('Editar', ['class' => 'btn btn-success']) !!}
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

        $('#agregar').on('click', function(){
            $('#responsive-modal').modal('show');
        });
        $('#editar').on('click', function(){
            $('#selectDisco-modal').modal('show');
        });
 
        $("#select").on('click', function(){

                var nombres_paises = {};

                $('.discos').each(function() {
                    nombres_paises[$(this).attr('id')] = $(this).val();
                });
                alert(nombres_paises);
            
        });
    });
        var BASEURL = '{{ url('/') }}';
        var mostrarValor = function(x){
                 //alert("El valor: "+x.value+" y el texto: "+x.options[x.selectedIndex].text);
            $.ajax({
                url: BASEURL+'/profile/banda/disco/'+x.value,
                type : 'GET',
                success: function(result){
                    console.log(result);
                    $('#selectDisco2-modal #nombre').val(result[0].nombre);
                    $('#selectDisco2-modal #año').val(result[0].año);
                    $('#selectDisco2-modal #sello').val(result[0].sello);
                    $('#selectDisco2-modal #tipo').val(result[0].tipo);
                    
                    $.ajax({
                        url: BASEURL+'/profile/banda/disco/canciones/'+result[0].id,
                        type : 'GET', 
                        success: function(data){

                            var num = 0;
                            data.forEach(function(canciones){
                                console.log(canciones);
                                fi = document.getElementById('fiel2'); // 1
                                contenedor = document.createElement('div'); // 2
                                contenedor.id = 'div'+num; // 3
                                fi.appendChild(contenedor); // 4
                                 
                                ele = document.createElement('input'); // 5
                                ele.type = 'text'; // 6
                                ele.name = 'canciones'+num;
                                ele.class = 'form-control';
                                ele.value = canciones.titulo;
                                ele.placeholder = canciones.titulo;; // 6
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
                            });

                            $('#selectDisco2-modal').modal('show');
                        },
                        error: function(data){
                            console.log('Error:',data);
                        }                       
                    });
                },
                error: function(result){
                    console.log('Error:',result);
                }
            });
        }
        num=0;
        function crear(obj) {
          
          fi = document.getElementById('fiel2'); // 1
          contenedor = document.createElement('div'); // 2
          contenedor.id = 'div'+num; // 3
          fi.appendChild(contenedor); // 4
         
          ele = document.createElement('input'); // 5
          ele.type = 'text'; // 6
          ele.name = 'canciones'+num;
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
          fi = document.getElementById('fiel2'); // 1 
          fi.removeChild(document.getElementById(obj)); // 10
        }
    </script>
@endsection