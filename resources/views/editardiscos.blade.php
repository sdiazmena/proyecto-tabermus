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
            <div class='text-danger'>{{$errors->first('image')}}</div>
            @endif
            <?php $conteoDiscos =0?>
            @foreach ($discos as $disco)
                <hr class="featurette-divider">

                <div class="row fondoContenido">
                    <div>
                        <div class="col-md-5 fondoContenido">
                            <img src="http://localhost/tabermus/public/{{$disco->caratula}}" class="img-responsive" style="width:100%" alt="Image">
                        </div>
                        <div class="col-md-7">
                            <div>
                                <div class="row">
                                    <p><strong>Nombre: </strong>{{ $disco->nombre }}</p>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <strong>Año: </strong> {{ $disco->año }}
                                    </div>
                                    <div class="col-sm-4">
                                        <strong>Sello:</strong> {{ $disco->sello }}
                                    </div>
                                    <div class="col-sm-4">
                                        <strong>Tipo:</strong> {{ $disco->tipo }}
                                    </div>
                                </div>
                            </div>
                            <div>
                                <strong class="letraTitulo">Listado: </strong>
                                <div><strong class="letraTexto col-md-offset-2">Track: </strong>
                                    <strong class="letraTexto col-md-offset-1">Titulo: </strong>
                                </div>
                                @foreach ($listacanciones as $listacancion)
                                    <?php $indice=1 ?>
                                    @if($disco->id == $listacancion->id_disco)
                                        @foreach($canciones as $cancion)
                                            @foreach($cancion as $can)
                                                @if($listacancion->id_disco == $can->id_lista)
                                                    <div>
                                                        <strong class="letraTexto col-md-offset-2">{{$indice}}</strong>
                                                        <strong class="letraTexto col-md-offset-2">{{ $can->titulo }}</strong>
                                                        <?php $indice = $indice +1;
                                                        $numerodiscos = 1?>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    @endif
                                @endforeach
                                <?php $conteoDiscos = $conteoDiscos +1?>
                            </div>
                        </div>
                    </div>
                </div>
                

            @endforeach
            @if ($conteoDiscos >0)
            <a id="editar"  class="btn btn-danger">Editar Discos</a>
            @endif
            <a id="agregar"  class="btn btn-danger">Agregar Nuevo Disco</a>
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
                                    
                                   <select id="selectDisco" class = "form-control" name="elejir_comida" >
                                    @foreach ($discos as $disco)
                                        <option value="{{$disco->id}}">{{$disco->nombre}}</option>
                                    @endforeach
                                </select>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success letraPortada" onclick="mostrarValor()">ACEPTAR</button>
                            <button type="button" class="btn btn-dafault letraPortada" data-dismiss="modal">CANCELAR</button>
                        </div>
                    </div>
                </div>
            </div>
             {{ Form::open(['url' => '/profile/banda/'.$banda->id.'/discos/editar', 'method' => 'POST', 'role' => 'form','files'=>'true'])}}
             {{ csrf_field() }}
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
                                <input type="hidden" name="id" id="id">
                                
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
                                    
                                </fieldset>
                                <fieldset id="fiel3" class="letraPortada" >
                                    <input type="button" value="agregar" name="canciones[]" onclick="crear2(this)"/>
                                </fieldset>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <a id="delete" data-href="{{ url('/profile/banda') }}" data-id="" class="btn btn-danger">ELIMINAR</a>
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
        var _token = $('input[name="_token"]').val();
        $('#agregar').on('click', function(){
            $('#responsive-modal').modal('show');
        });
        $('#editar').on('click', function(){
            $('#selectDisco-modal').modal('show');
        });
        $('#delete').on('click', function(){
        var x= $(this);
        var table=document.getElementById('id');

        var delete_url = x.attr('data-href')+'/'+table.value;
       
            $.ajax({
              
                url: delete_url,
                type: 'DELETE',
                data: { _token : _token },
                success: function(result){
                    window.location.href = BASEURL+'/profile/banda/'+result+'/show';
                    
                },
                error: function(result){
                    alert('error');
                }
            });
        });
    });
        var BASEURL = '{{ url('/') }}';
        function mostrarValor(){
            x = document.getElementById("selectDisco");
            //alert("El valor: "+x.value+" y el texto: "+x.options[x.selectedIndex].text);
            $.ajax({
                url: BASEURL+'/profile/banda/disco/'+x.value,
                type : 'GET',
                success: function(result){
                    
                    $('#selectDisco2-modal #nombre').val(result[0].nombre);
                    $('#selectDisco2-modal #año').val(result[0].año);
                    $('#selectDisco2-modal #sello').val(result[0].sello);
                    $('#selectDisco2-modal #tipo').val(result[0].tipo);
                    $('#selectDisco2-modal #id').val(result[0].id);
                    $.ajax({
                        url: BASEURL+'/profile/banda/disco/canciones/'+result[0].id,
                        type : 'GET', 
                        success: function(data){

                            var num = 0;
                            $("#fiel2").empty();
                            $("#selectDisco-modal").empty();
                            data.forEach(function(canciones){
                                
                                fi = document.getElementById('fiel2'); // 1
                                contenedor = document.createElement('div'); // 2
                                contenedor.id = 'div'+num; // 3
                                fi.appendChild(contenedor); // 4
                                 
                                ele = document.createElement('input'); // 5
                                ele.type = 'text'; // 6
                                ele.name = 'cancionesEditadas'+num;
                                ele.class = 'form-control';
                                ele.value = canciones.titulo;
                                ele.placeholder = canciones.titulo;; // 6
                                contenedor.appendChild(ele); // 7
                                          
                                ele = document.createElement('input'); // 5
                                ele.type = 'button'; // 6
                                ele.value = 'Borrar'; // 8
                                ele.name = 'div'+num; // 8
                                ele.onclick = function () {borrar3(this.name)} // 9
                                contenedor.appendChild(ele); 
                                function borrar3(obj) {
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
          
          fi = document.getElementById('fiel'); // 1
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
          fi = document.getElementById('fiel'); // 1 
          fi.removeChild(document.getElementById(obj)); // 10
        }
        num=0;
        function crear2(obj) {
          
          fi = document.getElementById('fiel3'); // 1
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
          ele.onclick = function () {borrar2(this.name)} // 9
          contenedor.appendChild(ele); // 7
          num++;
        }
        function borrar2(obj) {
          fi = document.getElementById('fiel3'); // 1 
          fi.removeChild(document.getElementById(obj)); // 10
        }

    </script>
@endsection