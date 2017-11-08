@extends('layouts.prueba')

@section('content')    
    <div class="col-sm-8 bloqueContenido">
        <h1 class="well text-center">{{ $banda->nombre }} Perfil</h1>
        <div class="well">
            <ul class="nav nav-tabs">
                <li><a href="/tabermus/public/profile/banda/{{$banda->id}}/edit">Perfil</a></li>
                <li><a href="/tabermus/public/profile/banda/{{$banda->id}}/historia">Historia</a></li>
                <li class="active"><a href="/tabermus/public/profile/banda/{{$banda->id}}/discos">Musica y Discos</a></li>
                <li><a href="/tabermus/public/profile/banda/{{$banda->id}}/fechas">Fechas</a></li>
            </ul>
            <a id="agregar" data-href="{{ url('calendario') }}" data-id="" class="btn btn-danger">Agregar Nuevo Disco</a>
             {{ Form::open(['route' => 'calendario.store', 'method' => 'post', 'role' => 'form'])}}
            <div id="responsive-modal" class="modal fade" tabindex="-1" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Agregar Nuevo Disco</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" name="id_banda" value= "{{$banda->id}}">
                                {{ Form::label('nombre', 'NOMBRE DISCO')}}
                                {{ Form::text('nombre', old('nombre'),['class' => 'form-control']) }}
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
                                        for ($i=1950; $i<=2018; $i++) {
                                           echo "<option value='$i'>$i</option>";
                                        }  
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                {{ Form::label('sello', 'SELLO')}}
                                {{ Form::text('sello', old('sello'),['id'=>'time_start','class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('tipo', 'TIPO')}}
                                {{ Form::text('tipo', old('tipo'),['id'=>'date_end','class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('informacion', 'INFORMACIÓN')}}
                                {{ Form::text('informacion', old('informacion'),['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('canciones', 'CANCIONES')}}
                                {{ Form::text('canciones', old('canciones'),['class' => 'form-control']) }}
                                <fieldset id="fiel" >
                                    <input type="button" value="Crear" onclick="crear(this)" />
                                </fieldset>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dafault" data-dismiss="modal">CANCELAR</button>
                            {!! Form::submit('GUARDAR', ['class' => 'btn btn-success']) !!}
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
    });
num=0;
function crear(obj) {
  num++;
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
}
function borrar(obj) {
  fi = document.getElementById('fiel'); // 1 
  fi.removeChild(document.getElementById(obj)); // 10
}
    </script>
@endsection