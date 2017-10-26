@extends('layouts.prueba')

@section('css')
        {{ Html::style('fullcalendar/fullcalendar.min.css') }}
        {{ Html::style('fullcalendar/fullcalendar.print.min.css') }}
        {{ Html::style('fullcalendar/lib/cupertino/jquery-ui.min.css') }}
@endsection

@section('content')    
    <div class="col-sm-8 bloqueContenido">
            <h1 class="well text-center">Calendario</h1>

<div class="row">
	<div class="card">
		<div class="col l7 offset-l1 m12 s12">
			<div id="calendar"></div>
		</div>
	</div>
</div>
                

    </div>
@endsection

@section('scripts')
    {{ Html::script('fullcalendar/lib/jquery-ui.custom.min.js') }}
    {{ Html::script('fullcalendar/lib/moment.min.js') }}
    {{ Html::script('fullcalendar/fullcalendar.min.js') }}
    {{ Html::script('fullcalendar/lang-all.js') }}
    <script>
        //inicializamos el calendario al cargar la pagina
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
			events: [
				{
					title: 'All Day Event',
					start: '2017-10-01'
				},
				{
					title: 'Long Event',
					start: '2017-10-07',
					end: '2017-10-10'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2017-10-09T16:00:00'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2017-10-16T16:00:00'
				},
				{
					title: 'Conference',
					start: '2017-10-11',
					end: '2017-10-13'
				},
				{
					title: 'Meeting',
					start: '2017-10-12T10:30:00',
					end: '2017-10-12T12:30:00'
				},
				{
					title: 'Lunch',
					start: '2017-10-12T12:00:00'
				},
				{
					title: 'Meeting',
					start: '2017-10-12T14:30:00'
				},
				{
					title: 'Happy Hour',
					start: '2017-10-12T17:30:00'
				},
				{
					title: 'Dinner',
					start: '2017-10-12T20:00:00'
				},
				{
					title: 'Birthday Party',
					start: '2017-10-13T07:00:00'
				},
				{
					title: 'Click for Google',
					url: 'http://google.com/',
					start: '2017-10-28'
				}
			]
		});
		
	});
    </script>
@endsection