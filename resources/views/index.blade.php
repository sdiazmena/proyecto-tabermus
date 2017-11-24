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
    {{ Html::script('js/scriptFacebook.js') }}
    {{ Html::script('js/dropdown.js') }}
    {{ Html::script('js/integrantes.js') }}
    {{ Html::script('js/scriptIndex.js') }}
    {{ Html::script('js/scriptRegionesBarraMenu.js') }}

    <?php setcookie("idRegion", "id");
    setcookie("nameRegion", "name");
    ?>

</head>

<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">TaberMus: La Taberna Musical</a>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="col-xs-2">
        <img class="img-responsive" style="margin-left: 40px" src="{{ asset('img/mapa-Chile-web.png') }}" title="Regiones">
    </div>
    <div class="col-xs-7">

        <div class="fondoContenido">
            <img class="img-responsive" src="{{ asset('img/logo2.png') }}" class="img-thumbnail">
        </div>
        <div class="fondoContenido">
            <h2 class="text-center letraTitulo">Bienvenido</h2>
            <p>Tabermus es una comunidad orientada a la musica nacional. Todo aquellos que desen compartir su musica y/o acceder
                a musica nacional, es bienvenido a acceder al contenido de esta pagina.</p>
        </div>

        <div id="imgRegion" class="col-sm-6 fondoContenido">
            <img class="img-responsive" src="{{ asset('img/region/seleccione.jpg') }}" class="img-thumbnail">
        </div>

        <div class="col-sm-6 fondoContenido">
            <h4 class="letraTitulo">Para comenzar, por favor escoga su ubicacion</h4>
            <p>Esto nos permitira entregarte informacion relevante a tu cercania y estes al tanto de lo que acontecede.</p>

            <form action="cambiarVista" method="POST">
                {!! csrf_field() !!}
                {!! Form::select('region', $regiones, null,['id'=>'region','class' => 'form-control', 'onchange'=> 'actualizarSeleccionImagen()', 'placeholder' => 'Seleccione una región..','required']) !!}
                {!! Form::submit('Entrar', ['class' => 'btn btn-primary']) !!}
            </form>

        </div>

    </div>
    <div class="col-sm-3 text-center">
        <div class="fondoContenido">
            <p class="titulo"><img  src="{{ asset('img/twitter.png') }}" style="width:100px; height: 40px"></p>
            <a class="twitter-timeline" href="https://twitter.com/TabermusChile">Tweets by TabermusChile</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
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
