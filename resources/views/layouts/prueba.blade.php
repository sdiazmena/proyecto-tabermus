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
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    {{ Html::style('css/barraLateral.css') }}
    {{ Html::style('css/plantilla.css') }}
    {{ Html::style('css/app.css') }}
    {{ Html::script('js/scriptBarraLateral.js') }}
    {{ Html::script('js/scriptFacebook.js') }}
    {{ Html::script('js/dropdown.js') }}
    {{ Html::script('js/integrantes.js') }}
    {{ Html::script('js/scriptsBandaAgregarEliminarElementos.js') }}
    {{ Html::script('js/scriptBusqueda.js') }}
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
                      <a class="navbar-brand" href="{{url('/')}}">TaberMus: La Taberna Musical</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#">Inicio</a></li>
                     <!--   <li><a href="#">Calendario</a></li>
                        <li><a href="#">Contacto</a></li>
                        <li><a href="#">Sobre</a></li>-->
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
                                    <li><a href="{{url('/profile')}}"><span class="glyphicon glyphicon-user">Perfil</a></li>
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
   <!-- <div id="wrapper">
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
    </div>--><br>
    @yield('content')
    <div class="col-sm-3 text-center">
        <div class="well">
            <p class="well">Twitter</p>
            <a class="twitter-timeline" href="https://twitter.com/TabermusChile">Tweets by TabermusChile</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
        <div class="well">
            <p class="well">Instagram</p>
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