@extends('layouts.prueba')

@section('css')
        {{ Html::style('calendar/fullcalendar/fullcalendar.min.css') }}
        
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
    <div class="col-sm-8 bloqueContenido">
		<br>
		<p class="titulo text-center"><img  src="{{ asset('img/titulos/calendario.png') }}" style="width:350px; height: 90px"></p>

			<div id="calendar" class="fondoContenido"></div>

    </div>

	<div id="responsive-modal" class="modal fade" tabindex="-1" data-backdrop="static">
		<div class="modal-dialog">
			<div class="modal-content fondoContenido letraTitulo">
				<div class="modal-header">
					<h4 color="black" class="titulo">Informacion Show</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<strong>Nombre:</strong>
						<span id="nombreShow"></span>
					</div>
					<div class="row">
						<strong>Ciudad:</strong>
						<span id="ciudadShow"></span>
					</div>
					<div class="row">
						<strong>Fecha/Hora Inicio:</strong>
						<span id="fechaShow"></span>
					</div>
					<div class="row">
						<strong>Informacion:</strong>
						<span id="infShow"></span>
					</div>
					<div class="row">
						<strong>Valor:</strong>
						<span id="valor"></span>
					</div>
					<div class="row">
						<strong>Mas Informacion visitar:</strong>
						<span id="facebook"></span>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-dafault letraPortada" data-dismiss="modal">Salir</button>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
    {{ Html::script('calendar/fullcalendar/lib/jquery-ui.min.js') }}
    {{ Html::script('calendar/fullcalendar/lib/moment.min.js') }}
    {{ Html::script('calendar/fullcalendar/fullcalendar.min.js') }}

    {{ Html::script('calendar/fullcalendar/locale/es.js') }}
    <script>
        //inicializamos el calendario al cargar la pagina
        var BASEURL = '{{ url('/') }}';
$(document).ready(function() {
		
		$('#calendar').fullCalendar({
            header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: BASEURL+'/calendarios',

            eventClick: function(calEvent, jsEvent, view) {

                //$(this).css('background', 'red');
                $('#responsive-modal').modal('show');
                var BASEURL = '{{ url('/') }}';

                //alert('Event: ' + calEvent.id);
                //al evento click; al hacer clic sobre un evento cambiara de background
                //a color rojo y nos enviara a los datos generales del evento seleccionado

                $.ajax({
                    url: BASEURL+'/show/'+calEvent.id ,
                    type : 'GET',
                    success: function(result){
                        console.log(result);
                        $('#nombreShow').text(result[0].title);
                                          $.ajax({
                        url: BASEURL+'/ciudad/'+result[0].id_ciudad,
                        type: 'GET',
                        success: function(data){
                            $('#ciudadShow').text(data[0].nombre);
                        },
                        error: function(){
                            console.log('Error');
                        }
                    });
                        
                        $('#fechaShow').text(result[0].start);
                        $('#infShow').text(result[0].informacion);
                        $('#valor').text(result[0].precio);
                        $('#facebook').text(result[0].link);
                    },
                    error: function(){
                        console.log('Error:');
                    }
                })
            },
		});
		
	});
    </script>
@endsection