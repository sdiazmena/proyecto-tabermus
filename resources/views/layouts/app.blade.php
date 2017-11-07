<!DOCTYPE html>
<html lang="en">
<head>
    <title>TaberMus Chile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <link href="/css/app.css" rel="stylesheet">

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
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
    @yield('scripts')
    {{ Html::style('css/plantilla.css') }}
    {{ Html::script('js/scriptLogin.js') }}
    {{ Html::script('js/scriptIndex.js') }}
</head>
<body>
    <div id="app">
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.10&appId=257103195520";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

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
                        <li><a href="home">Inicio</a></li>
                        <li><a href="/tabermus/public/calendario">Calendario</a></li>
                        <li><a href="buscar">Buscar</a></li>
                        <li id="topRegion" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_COOKIE["nameRegion"];?><span class="caret"></span></a>
                            <ul id="barraRegionesTop" class="dropdown-menu">
                                <li><a href="#" onclick="setRegion('1','Tarapacá')">Tarapacá</a></li>
                                <li><a href="#" onclick="setRegion('2','Antofagasta')">Antofagasta</a></li>
                                <li><a href="#" onclick="setRegion('3','Atacama')">Atacama</a></li>
                                <li><a href="#" onclick="setRegion('4','Coquimbo')">Coquimbo</a></li>
                                <li><a href="#" onclick="setRegion('5','Valparaiso')">Valparaiso</a></li>
                                <li><a href="#" onclick="setRegion('6','O\'Higgins')">O'Higgins</a></li>
                                <li><a href="#" onclick="setRegion('7','Maule')">Maule</a></li>
                                <li><a href="#" onclick="setRegion('8','Biobío')">Biobío</a></li>
                                <li><a href="#" onclick="setRegion('9','Araucania')">Araucania</a></li>
                                <li><a href="#" onclick="setRegion('10','Los Lagos')">Los Lagos</a></li>
                                <li><a href="#" onclick="setRegion('11','Aisén')">Aisén</a></li>
                                <li><a href="#" onclick="setRegion('12','Magallanes')">Magallanes</a></li>
                                <li><a href="#" onclick="setRegion('13','Santiago')">Santiago</a></li>
                                <li><a href="#" onclick="setRegion('14','Los Rios')">Los Rios</a></li>
                                <li><a href="#" onclick="setRegion('15','Arica')">Arica</a></li>
                            </ul>
                        </li>
                        <script type="text/javascript">
                            actualizarBarraRegion(getRegion());
                            cargarPortada();
                        </script>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Informacion<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="somos">¿Quienes somos?</a></li>
                                <li><a href="contacto">Contacto</a></li>
                                <li><a href="sugerencia">Sugerencias</a></li>
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

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
