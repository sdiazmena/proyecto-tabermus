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
            <h1 class="well text-center">Calendario</h1>


			<div id="calendar"></div>

                

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
			defaultDate: '2017-10-12',
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: BASEURL+'/calendar'
		});
		
	});
    </script>
@endsection