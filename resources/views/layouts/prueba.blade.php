<!DOCTYPE html>
<html lang="en">
<head>
    <title>TaberMus Chile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
    {{ Html::script('calendar/jquery.min.js') }}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    {{ Html::style('calendar/bootstrap/dist/css/bootstrap.min.css') }}
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }

  </style>
      @yield('css')
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <script>
        function guardarDatos(valorId, valorName){

            setRegion(valorId);
        }
    </script>
        
    @yield('scripts')
    {{ Html::style('css/barraLateral.css') }}
    {{ Html::style('css/plantilla.css') }}
    {{ Html::style('css/app.css') }}
    {{ Html::script('js/scriptBarraLateral.js') }}
    {{ Html::script('js/scriptFacebook.js') }}
    {{ Html::script('js/dropdown.js') }}
    {{ Html::script('js/integrantes.js') }}
    {{ Html::script('js/scriptsBandaAgregarEliminarElementos.js') }}
    {{ Html::script('js/scriptRegionesBarraMenu.js') }}
    {{ Html::script('js/scriptIndex.js') }}


</head>
<body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                      </button>
                      <a class="navbar-brand" href="{{url('/home')}}">TaberMus: La Taberna Musical</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/tabermus/public/home">Inicio</a></li>
                        <li><a href="/tabermus/public/calendario">Calendario</a></li>
                        <li><a href="/tabermus/public/buscar">Buscar</a></li>
                        <li id="topRegion" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_COOKIE["nameRegion"];?><span class="caret"></span></a>
                            <ul id="barraRegionesTop" class="dropdown-menu">
                                <li><a href="/tabermus/public/home" onclick="setRegion('1','Tarapacá')">Tarapacá</a></li>
                                <li><a href="/tabermus/public/home" onclick="setRegion('2','Antofagasta')">Antofagasta</a></li>
                                <li><a href="/tabermus/public/home" onclick="setRegion('3','Atacama')">Atacama</a></li>
                                <li><a href="/tabermus/public/home" onclick="setRegion('4','Coquimbo')">Coquimbo</a></li>
                                <li><a href="/tabermus/public/home" onclick="setRegion('5','Valparaiso')">Valparaiso</a></li>
                                <li><a href="/tabermus/public/home" onclick="setRegion('6','O\'Higgins')">O'Higgins</a></li>
                                <li><a href="/tabermus/public/home" onclick="setRegion('7','Maule')">Maule</a></li>
                                <li><a href="/tabermus/public/home" onclick="setRegion('8','Biobío')">Biobío</a></li>
                                <li><a href="/tabermus/public/home" onclick="setRegion('9','Araucania')">Araucania</a></li>
                                <li><a href="/tabermus/public/home" onclick="setRegion('10','Los Lagos')">Los Lagos</a></li>
                                <li><a href="/tabermus/public/home" onclick="setRegion('11','Aisén')">Aisén</a></li>
                                <li><a href="/tabermus/public/home" onclick="setRegion('12','Magallanes')">Magallanes</a></li>
                                <li><a href="/tabermus/public/home" onclick="setRegion('13','Santiago')">Santiago</a></li>
                                <li><a href="/tabermus/public/home" onclick="setRegion('14','Los Rios')">Los Rios</a></li>
                                <li><a href="/tabermus/public/home" onclick="setRegion('15','Arica')">Arica</a></li>
                            </ul>
                        </li>
                        <script type="text/javascript">
                            actualizarBarraRegion(getRegion());
                        </script>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Informacion<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/tabermus/public/somos">¿Quienes somos?</a></li>
                                <li><a href="/tabermus/public/contacto">Contacto</a></li>
                            </ul>
                        </li>

                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        @else
                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                <?php  
                                    $poe = 'https://graph.facebook.com/v2.8/';
                                    $google = 'https://lh6.googleusercontent.com';
                                    $pos = strpos(Auth::user()->avatar, $poe);
                                    $pos2 = strpos(Auth::user()->avatar, $google);
                                ?>
                                @if($pos === false && $pos2 === false)
                                    <img src="/tabermus/public/uploads/avatars/{{Auth::user()->avatar}}" style="width:75px; height:75px; float:center; border-radius:50%; margin-right:25px;">
                                @else

                                    <img src="{{Auth::user()->avatar}}" style="width:75px; height:75px; float:center; border-radius:50%; margin-right:25px;">
                                @endif
                                    <li><a href="{{url('/profile')}}"><span class="glyphicon glyphicon-user">Perfil</span></a></li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <span class="glyphicon glyphicon-log-out"></span>Logout
                                        </a>


                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                                    </li>
                                </ul>
                            </li>
                        @endif
                        
                    </ul>
                </div>
            </div>
        </nav>
<br>
<br>
<div class="container-fluid">
   <div id="wrapper" class="toggled">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav" style="margin-left:0;">
                <li class="sidebar-brand"></li>
                <a href="#menu-toggle"  id="menu-toggle" style="margin-top:10px;float:right;">
                    <i  style="font-size:20px !Important;" aria-hidden="true" aria-hidden="true">
                        <span class="glyphicon glyphicon-menu-left"></span>
                    </i>
                </a>
                <h4 class="letraTitulo">Filtrado de Bandas</h4>
                <div class="fondoContenido text-center">
                    <h4 class="letraTitulo">En tu Region</h4>
                    {!! Form::open(['route' => 'filtrado/regional', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
                    <button type="submit" name="seleccion" value="Ciudad">Ciudad</button>
                    <button type="submit" name="seleccion" value="Genero">Genero</button>
                    <button type="submit" name="seleccion" value="Letra">Alfabeticamente</button>
                    {!! Form::close() !!}
                    <h4 class="letraTitulo">Nacional</h4>
                    {!! Form::open(['route' => 'filtrado/nacional', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
                    <button type="submit" name="seleccion" value="region">Region</button>
                    <button type="submit" name="seleccion" value="genero">Genero</button>
                    <button type="submit" name="seleccion" value="letra">Alfabeticamente</button>
                    {!! Form::close() !!}
                </div>
            </ul>
            <br>
            <br>

        </div>
   </div>
    <div class="flotar">
        <a href="#menu-toggle" id="menu-toggle-button">
            <img  src="{{ asset('img/filtrar.png') }}" style="width:40px">
        </a>
    </div>
    @yield('content')
    <br>
    <div class="col-sm-3 text-center">
        <div class="fondoContenido">
            <p class="titulo"><img  src="{{ asset('img/twitter.png') }}" style="width:100px; height: 40px"></p>
            <a class="twitter-timeline" href="https://twitter.com/TabermusChile?ref_src=twsrc%5Etfw">Tweets by TabermusChile</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
        <div class="fondoContenido">
            <p class="titulo"><img  src="{{ asset('img/instagram.png') }}" style="width:100px; height: 40px"></p>
            <iframe src="https://snapwidget.com/embed/474648" class="snapwidget-widget" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:260px; height:260px"></iframe>
        </div>
        <div class="fondoContenido">
            <p class="titulo"><img  src="{{ asset('img/facebook.png') }}" style="width:100px; height: 40px"></p>
            <div class="fb-page" data-href="https://www.facebook.com/TaberMusChile" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/TaberMusChile" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/TaberMusChile">TaberMus Chile</a></blockquote></div>
        </div>
    </div>
</div>

<footer class="container-fluid text-center">
    <p></p>
    <p>Desarrollado por:</p>
    <p>Sebastian Mena Diaz</p>
    <p>Luis Gonzalez Donoso</p>

</footer>

</body>

</html>