@extends('layouts.prueba')

@section('content')  
<div class="container-fluid">
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav" style="margin-left:0;">
                <li class="sidebar-brand"></li>
                <a href="#menu-toggle"  id="menu-toggle" style="margin-top:22px;float:right;">
                    <i  style="font-size:20px !Important;" aria-hidden="true" aria-hidden="true">
                        <span class="glyphicon glyphicon-menu-left"></span>
                    </i>
                </a>
                <h3>Busqueda</h3>
                <div class="well text-center">
                    <h4>En tu Region</h4>
                    <p><a href="#">Ciudad</a></p>
                    <p><a href="#">Genero</a></p>
                    <p><a href="#">Alfabeticamente</a></p>
                    <p><a href="#">Mejor Puntuada</a></p>
                    <br>
                    <h4>Nacional</h4>
                    <p><a href="#">Region</a></p>
                    <p><a href="#">Genero</a></p>
                    <p><a href="#">Alfabeticamente</a></p>
                    <p><a href="#">Mejor Puntuada</a></p>
                </div>
            </ul>
        </div>
    </div>
    <br>
    <div class="col-sm-8 bloqueContenido">
        <h1 class="well text-center">Busqueda</h1>
        <ul class="nav nav-tabs">
            <li class="nav-item"><a href="#" id="tuRegion">Tu Region</a></li>
            <li class="nav-item"><a href="#" id="nacional">Nacional</a></li>
        </ul>
        <div>
            <div class="well" id="contenidoMostrar"></div>
            <div class="well" id="resultadoBusqueda"></div>
        </div>

    </div>


@endsection