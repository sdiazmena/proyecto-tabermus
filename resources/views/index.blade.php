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
            <h2>Bienvenido</h2>
            <p>Tabermus es una comunidad orientada a la musica nacional. Todo aquellos que desen compartir su musica y/o acceder
                a musica nacional, es bienvenido a acceder al contenido de esta pagina.</p>
        </div>

        <div id="imgRegion" class="col-sm-6">
            <img class="img-responsive fondoContenido" src="{{ asset('img/region/seleccione.jpg') }}" class="img-thumbnail">
        </div>

        <div class="col-sm-6 fondoContenido">
            <h4>Para comenzar, por favor escoga su ubicacion</h4>
            <p>Esto nos permitira entregarte informacion relevante a tu cercania y estes al tanto de lo que acontecede.</p>
            <label class="col-sm-2 control-label">Region:</label>
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
            <blockquote class="instagram-media" data-instgrm-version="7" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:37.5% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/BYZIHxVB2uI/" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">Una publicación compartida de TaberMusChile (@tabermuschile)</a> el <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2017-08-29T21:21:41+00:00">29 de Ago de 2017 a la(s) 2:21 PDT</time></p></div></blockquote>
            <script async defer src="//platform.instagram.com/en_US/embeds.js"></script>
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
