@extends('layouts.prueba')

@section('content')
    <div class="col-sm-8 text-left bloqueContenido">
        <br>
        <div class="fondoContenido">
            <h1 class="letraTitulo text-center">Bienvenido</h1>
        </div>
        <div class="fondoContenido">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">

                    <div class="item active">
                        <img class="img-responsive" src="{{ asset('img/logo2.png') }}" class="img-thumbnail" style='width:820px; height: 330px'>">
                        <div class="carousel-caption">
                        </div>
                    </div>

                    <div id="hola" class="item">
                        <script type="text/javascript">
                            cargarPortada();
                        </script>
                        <div class="carousel-caption">
                            <h3><?php echo $_COOKIE["nameRegion"];?></h3>
                            <!--<p>Thank you, Chicago!</p> -->
                        </div>
                    </div>

                    <div class="item">
                        <img class="img-responsive" src="{{ asset('img/portada2.jpg') }}" class="img-thumbnail" style="width:820px; height: 350px">
                        <div class="carousel-caption">
                            <h3>Nuestra pasion</h3>
                            <p>La musica es</p>
                        </div>
                    </div>

                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="fondoContenido">
            <h4>07/08/2017</h4>
            <div class="row">
                <div class="col-sm-4">
                    <div class="well">
                        <h4>Noticia 1</h4>
                        <p>Se agrego la siguiente entrada</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="well">
                        <h4>Noticia 3</h4>
                        <p>Se agrego la siguiente entrada</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="well">
                        <h4>Noticia 3</h4>
                        <p>Se agrego la siguiente entrada</p>
                    </div>
                </div>
                <hr>
            </div>
            <div class="row">
                <h4>06/08/2017</h4>

                <div class="col-sm-4">
                    <div class="well">
                        <h4>Noticia 4</h4>
                        <p>Se agrego la siguiente entrada</p>
                    </div>
                </div>
                <div class="col-sm-12">
                    <hr>
                    <ul class="pager">
                        <li><a href="#">Previous</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    
    


@endsection
