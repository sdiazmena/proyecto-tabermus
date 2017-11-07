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
	<br>
    <div class="col-sm-8 bloqueContenido">
		<p class="titulo text-center"><img  src="{{ asset('img/titulos/calendario.png') }}" style="width:350px; height: 90px"></p>

			<div id="calendar" class="fondoContenido"></div>

    </div>
@endsection

@section('scripts')
    {{ Html::script('calendar/fullcalendar/lib/jquery-ui.min.js') }}
    {{ Html::script('calendar/fullcalendar/lib/moment.min.js') }}
    {{ Html::script('calendar/fullcalendar/fullcalendar.min.js') }}
    {{ Html::script('calendar/fullcalendar/locale-all.js') }}
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
			events: BASEURL+'/calendarios'
		});
		
	});
    </script>
@endsection