@extends('layouts.prueba')
@section('css')
        
        {{ Html::style('calendar/fullcalendar/fullcalendar.min.css') }}
        {{ Html::style('calendar/bootstrap-datetimepicker/css/bootstrap-material-datetimepicker.css') }}
        {{ Html::style('calendar/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}
        <style>

    body {
        margin: 40px 10px;
        padding: 0;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
        font-size: 14px;
    }

    #calendar {
        max-width: 900px;
        margin: 0 auto;
    }

</style>


@endsection

@section('content')   
    @if ($status)
    <hr />
        <div class='titulo letraTitulo text-center' style = "text-align:center">
            {{$status}}
        </div>
    <hr />
    @endif
    <div class="col-sm-8 bloqueContenido">
        <h1 class="titulo letraTitulo text-center">{{ $banda->nombre }} Shows</h1>
        <div class="fondoContenido letraTitulo">
            <ul class="nav nav-tabs">
                <li ><a href="{{$rutaPerfil}}">Perfil</a></li>
                <li ><a href="{{$rutaHistoria}}">Historia</a></li>
                <li><a href="{{$rutaDiscos}}">Musica y Discos</a></li>
                <li class="active"><a href="{{$rutaFechas}}">Fechas</a></li>

            </ul>

        </div>
        @if($editable==1)
        {{ Form::open(['route' => 'calendario.store', 'method' => 'post', 'role' => 'form'])}}
        <div id="responsive-modal" class="modal fade letraPortada" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content fondoContenido letraTitulo">
                    <div class="modal-header">
                        <h4 class="titulo letraTitulo">REGISTRO DE NUEVO EVENTO</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{ Form::label('title', 'NOMBRE EVENTO')}}
                            {{ Form::text('title', NULL,['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="id_banda" value= "{{$banda->id}}">
                            {{ Form::label('date_start', 'FECHA INICIO')}}
                            {{ Form::text('date_start', NULL,['class' => 'form-control', 'readonly' => 'true']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('time_start', 'HORA INICIO')}}
                            {{ Form::text('time_start', NULL,['id'=>'time_start','class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('date_end', 'FECHA HORA FIN')}}
                            {{ Form::text('date_end', NULL,['id'=>'date_end','class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {!! Form::label('region', 'REGION') !!}
                             {!! Form::select('region', $regiones, null,['id'=>'region','class' => 'form-control', 'placeholder' => 'Seleccione una región..']) !!}
                        </div>
                        <div>
                            {!! Form::label('ciudad_id', 'CIUDAD') !!} 
                            {!! Form::select('ciudad_id', ['placeholder' => 'Seleccione una ciudad..'], null,['id'=>'ciudad','class' => 'form-control','value' => '{{$banda->id_ciudad}}']) !!}
                        </div><!--
                        <div class="form-group">
                            {{ Form::label('color', 'COLOR')}}
                            <div class="input-group colorpicker">
                                {{ Form::text('color', old('color'), ['class' => 'form-control']) }}
                                <span class="input-group-addon">
                                    <i></i>
                                </span>
                            </div>
                        </div>-->
                        <div class="form-group">
                            {{ Form::label('informacion', 'INFORMACIÓN')}}
                            {{ Form::text('informacion', NULL,['class' => 'form-control']) }}
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
        @endif
        <div id="calendar" class="fondoContenido letraTexto"></div>
        @if($editable==1)
        <div id="upload-modal" class="modal fade" tabindex="-1" data-backdrop="static">
        {{ Form::open(['url' => '/calendario/'.$banda->id , 'method' => 'put', 'role' => 'form'])}}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>ACTUALIZAR EVENTO</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{ Form::label('title', 'NOMBRE EVENTO')}}
                            {{ Form::text('title', old('title'),['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            <input type="hidden" id = "id_show" name="id_show" value= "">
                            {{ Form::label('date_start', 'FECHA INICIO')}}
                            {{ Form::text('date_start', old('date_start'),['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('time_start', 'HORA INICIO')}}
                            {{ Form::text('time_start', old('time_start'),['id'=>'time_start','class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('date_end', 'FECHA HORA FIN')}}
                            {{ Form::text('date_end', old('date_end'),['id'=>'date_end','class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {!! Form::label('region', 'REGION') !!}
                            {{ Form::text('id_region', old('id_region'),['id' => 'id_region', 'class' => 'form-control', 'readonly' => 'true']) }}
                             {!! Form::select('region', $regiones, null,['id'=>'region','class' => 'form-control', 'placeholder' => 'Seleccione una región..']) !!}
                        </div>
                        <div>
                            {!! Form::label('ciudad_id', 'CIUDAD') !!} 
                            {{ Form::text('id_ciudad', old('id_ciudad'),['id' => 'id_ciudad', 'class' => 'form-control', 'readonly' => 'true']) }}
                            {!! Form::select('ciudad', ['placeholder' => 'Seleccione una ciudad..'], null,['id'=>'ciudad','class' => 'form-control']) !!}
                        </div><!--
                        <div class="form-group">
                            {{ Form::label('color', 'COLOR')}}
                            <div class="input-group colorpicker">
                                {{ Form::text('color', old('color'), ['class' => 'form-control']) }}
                                <span class="input-group-addon">
                                    <i></i>
                                </span>
                            </div>
                        </div>-->
                        <div class="form-group">
                            {{ Form::label('informacion', 'INFORMACIÓN')}}
                            {{ Form::text('informacion', old('informacion'),['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a id="delete" data-href="{{ url('/calendario') }}" data-id="" class="btn btn-danger">ELIMINAR</a>
                        <button type="button" class="btn btn-dafault" data-dismiss="modal">CANCELAR</button>
                        {!! Form::submit('ACTUALIZAR', ['class' => 'btn btn-success']) !!}
                    </div>
                </div>
            </div>
        {{ Form::close() }}
        </div>
        @endif
    </div>
@endsection





@section('scripts')

    {{ Html::script('calendar/fullcalendar/lib/moment.min.js') }}

    {{ Html::script('calendar/bootstrap/dist/js/bootstrap.min.js') }}
    {{ Html::script('calendar/fullcalendar/fullcalendar.min.js') }}
    {{ Html::script('calendar/fullcalendar/locale/es.js') }}
    {{ Html::script('calendar/bootstrap-datetimepicker/js/bootstrap-material-datetimepicker.js') }}
    {{ Html::script('calendar/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}
    <script>
        //inicializamos el calendario al cargar la pagina
        var BASEURL = '{{ url('/') }}';
        var mivarJS=<?php echo $banda->id ?>;
        $(document).ready(function() {
        
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            selectable: true,
            selectHelper: true,

            select: function(start){
                start = moment(start.format());
                $('#date_start').val(start.format('YYYY-MM-DD'));
                $('#responsive-modal').modal('show');
            },
            events: BASEURL+'/calendarios/banda/'+mivarJS,

            eventClick: function(event, jsEvent, view){
                var date_start = $.fullCalendar.moment(event.start).format('YYYY-MM-DD');
                var time_start = $.fullCalendar.moment(event.start).format('hh:mm:ss');
                var date_end = $.fullCalendar.moment(event.end).format('YYYY-MM-DD hh:mm:ss');
                $('#upload-modal #delete').attr('data-id', event.id);
                $('#upload-modal #id_show').val(event.id);
                $('#upload-modal #title').val(event.title);
                $('#upload-modal #date_start').val(date_start);
                $('#upload-modal #time_start').val(time_start);
                $('#upload-modal #date_end').val(date_end);
                $('#upload-modal #color').val(event.color);
                $('#upload-modal #informacion').val(event.informacion);
                $.ajax({
                    url: BASEURL+'/region/'+event.id_region,
                    type: 'GET',
                    success: function(data){
                        
                        $('#upload-modal #id_region').val(data[0].nombre);
                        console.log(event.id_ciudad);
                        $.ajax({
                            url: BASEURL+'/ciudad/'+event.id_ciudad,
                            type: 'GET',
                            success: function(result){
                                console.log(result[0].nombre);
                                $('#upload-modal #id_ciudad').val(result[0].nombre);
                            },
                            error: function(result){
                                console.log('Error:',result);
                            }
                        });
                    },
                    error: function(data){
                            console.log('Error:',data);
                    } 
                });
                $('#upload-modal').modal('show');
            }
        });
        
    
    $('#color').colorpicker();
    $('#time_start').bootstrapMaterialDatePicker({
        date: false,
        shortTime: false,
        format: 'HH:mm:ss'
    });
    $('#date_end').bootstrapMaterialDatePicker({
        date: true,
        shortTime: false,
        format: 'YYYY-MM-DD HH:mm:ss'
    });

    $('#delete').on('click', function(){
        var x= $(this);
        var delete_url = x.attr('data-href')+'/'+x.attr('data-id');
        
        $.ajax({
          
            url: delete_url,
            type: 'DELETE',
            success: function(result){
                
                window.location.href = BASEURL+'/calendarios/delete/'+result;
            },
            error: function(result){
                alert('error');
            }
        });
    });
});
    </script>
@endsection