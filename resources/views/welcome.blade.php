@extends('layouts.prueba')

@section('content')



    <div class="col-sm-8 text-left bloqueContenido">
        <div class="well">
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
                        <img class="img-responsive well" src="{{ asset('img/logo.png') }}" class="img-thumbnail" style="width:820px">
                        <div class="carousel-caption">
                            <h3>Los Angeles</h3>
                            <p>LA is always so much fun!</p>
                        </div>
                    </div>

                    <div id="hola" class="item">
                        <script type="text/javascript">
                            cargarPortada();
                        </script>
                        <div class="carousel-caption">
                            <h3><?php echo $_COOKIE["nameRegion"];?></h3>
                            <p>Thank you, Chicago!</p>
                        </div>
                    </div>

                    <div class="item">
                        <img class="img-responsive well" src="{{ asset('img/portada2.jpg') }}" class="img-thumbnail" style="width:820px; height: 350px">
                        <div class="carousel-caption">
                            <h3>New York</h3>
                            <p>We love the Big Apple!</p>
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

        <h1>Bienvenido</h1><h5>Accede a las novedades que tenemos para ti:</h5>
      
      <hr>
      <h4>07/08/2017</h4>
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
      <h5>..</h5>
      <hr>
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
    
    


@endsection
