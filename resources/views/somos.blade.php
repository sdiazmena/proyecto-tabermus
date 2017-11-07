@extends('layouts.prueba')

@section('content')    
    <div class="col-sm-8 bloqueContenido">
        <br>
        <p class="titulo text-center"><img  src="{{ asset('img/titulos/somos.png') }}" style="width:400px; height: 90px"></p>
        <!-- Left-aligned media object -->

        <div class="fondoContenido">
            <p>Somos personas amante de la musica nacional, quienes prentender poder general un espacio para las bandas que
                van surgiendo dias a dia. Es asi que en esta pagina entregamos herramientas donde los usuarios podran darse
            a conocer sus trabajos. Ademas de permitir a todos aquellos que buscan informacion del acontecer nacional, puedan
            obtener una busqueda mucho mas satisfactoria</p>
            <p>Nuestro principal objetivo es ser un aparte a la difusion y catastro de la musica nacional, el entregar un espacio
             donde se genere una comunidad amante de la musica. Lugar donde las personas podran estar atentos al acontecer nacional
            y principalmente lo que sucede dentro de su region. Ademas de permitir a los musicos un lugar donde puedan mostrarse
            permtiendo enlazar en un solo punto, su informacion, ayudando a evitar la dispersion de la informacion dentro de la red</p>
        </div>

        <div class="fondoContenido">
        <div class="media">
            <div class="media-left">
                <img src="{{ asset('img/somos/seba.jpg') }}" class="media-object" style="width:100px">
            </div>
            <div class="media-body">
                <h4 class="media-heading">Sebastian Esteban Diaz Mena</h4>
                <p>Ocupacion: Estudiante de Ingenieria de Ejecucion en Informatica</p>
                <p>Hobbie: Deportes</p>
            </div>
        </div>

        </div>
        <div class="fondoContenido">
        <!-- Right-aligned media object -->
        <div class="media">
            <div class="media-body">
                <h4 class="media-heading">Luis Javier Gonzalez Donoso</h4>
                <p>Ocupacion: Estudiante de Ingenieria de Ejecucion en Informatica</p>
                <p>Hobbie: Escuchar musica, ir a conciertos, musico.</p>
            </div>
            <div class="media-right">
                <img src="{{ asset('img/somos/luis.jpg') }}" class="media-object" style="width:100px">
            </div>
        </div>
        </div>

    </div>
@endsection