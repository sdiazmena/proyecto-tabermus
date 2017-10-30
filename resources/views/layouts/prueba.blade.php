<!DOCTYPE html>
<html lang="en">
<head>
    <title>TaberMus Chile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }

    .flotar {
        position: fixed;
        top: 50px;
        left: 0;
        padding: 0;
        background-color: #5e5e5e;
        border: 2px solid;
        z-index: 1;
        width: 25px;
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
    @yield('scripts')
    {{ Html::style('css/barraLateral.css') }}
    {{ Html::style('css/plantilla.css') }}
    {{ Html::style('css/app.css') }}
    {{ Html::script('js/scriptBarraLateral.js') }}
    {{ Html::script('js/scriptFacebook.js') }}
    {{ Html::script('js/dropdown.js') }}
    {{ Html::script('js/integrantes.js') }}
    {{ Html::script('js/scriptsBandaAgregarEliminarElementos.js') }}
    {{ Html::script('js/scriptBusqueda.js') }}
    {{ Html::script('js/scriptRegionesBarraMenu.js') }}

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
                        <li class="active"><a href="home">Inicio</a></li>
                        <li><a href="calendario">Calendario</a></li>
                        <li><a href="buscar">Buscar</a></li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Valparaiso<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="home" onclick="actualizarRegion('1')">Tarapacá</a></li>
                                <li><a href="home" onclick="actualizarRegion('2')">Antofagasta</a></li>
                                <li><a href="home" onclick="actualizarRegion('3')">Atacama</a></li>
                                <li><a href="home" onclick="actualizarRegion('4')">Coquimbo</a></li>
                                <li><a href="home" onclick="actualizarRegion('5')">Valparaiso</a></li>
                                <li><a href="home" onclick="actualizarRegion('6')">O'Higgins</a></li>
                                <li><a href="home" onclick="actualizarRegion('7')">Maule</a></li>
                                <li><a href="home" onclick="actualizarRegion('8')">Biobío</a></li>
                                <li><a href="home" onclick="actualizarRegion('9')">Araucania</a></li>
                                <li><a href="home" onclick="actualizarRegion('10')">Los lagos</a></li>
                                <li><a href="home" onclick="actualizarRegion('11')">Aisén</a></li>
                                <li><a href="home" onclick="actualizarRegion('12')">Magallanes</a></li>
                                <li><a href="home" onclick="actualizarRegion('13')">Santiago</a></li>
                                <li><a href="home" onclick="actualizarRegion('14')">Los rios</a></li>
                                <li><a href="home" onclick="actualizarRegion('15')">Arica</a></li>
                            </ul>
                        </li>
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

                                @if(Auth::user()->password == '')
                                    <img src="{{Auth::user()->avatar}}" style="width:75px; height:75px; float:center; border-radius:50%; ">
                                @else
                                    <img src="uploads/avatars/{{ Auth::user()->avatar }}" style="width:75px; height:75px; float:center; border-radius:50%; margin-right:25px;">

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
                <h4>Filtrado de Bandas</h4>
                <div class="well text-center">
                    <h4>En tu Region</h4>
                    <p><a href="filtrado">Ciudad</a></p>
                    <p><a href="filtrado">Genero</a></p>
                    <p><a href="filtrado">Alfabeticamente</a></p>
                    <br>
                    <h4>Nacional</h4>
                    <p><a href="filtrado">Region</a></p>
                    <p><a href="filtrado">Genero</a></p>
                    <p><a href="filtrado">Alfabeticamente</a></p>
                </div>
            </ul>
            <br>
            <br>

        </div>
   </div>
    <div class="flotar">
        <a href="#">
            <p>F</p>
            <p>i</p>
            <p>l</p>
            <p>t</p>
            <p>r</p>
            <p>a</p>
            <p>d</p>
            <p>o</p>
        </a>
        <button href="#menu-toggle" id="menu-toggle-button" class="glyphicon glyphicon-search"></button>
    </div>
    @yield('content')
    <div class="col-sm-3 text-center">
        <div class="well">
            <p class="well">Twitter</p>
            <a class="twitter-timeline" href="https://twitter.com/TabermusChile">Tweets by TabermusChile</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
        <div class="well">
            <p class="well">Instagram</p>
            <blockquote class="instagram-media" data-instgrm-version="7" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:37.5% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/BYZIHxVB2uI/" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">Una publicación compartida de TaberMusChile (@tabermuschile)</a> el <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2017-08-29T21:21:41+00:00">29 de Ago de 2017 a la(s) 2:21 PDT</time></p></div></blockquote>
            <script async defer src="//platform.instagram.com/en_US/embeds.js"></script>
        </div>
        <div class="well">
            <p class="well">Facebook</p>
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