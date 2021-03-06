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
                        <?php echo $foto?>
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
            <h1 class="letraTitulo">Noticias <?php echo $_COOKIE["nameRegion"];?>:</h1>
            <hr class="featurette-divider">
            <div class="row">
                <div class="col-sm-6">
                    <?php $existeNoticiaBanda = 0?>
                    <p class="titulo letraTitulo">Actualizacion de bandas:</p>
                    @foreach($actualizaciones as $actualizacion)
                        @foreach($bandas as $banda)
                            @if($banda->id == $actualizacion->id_banda)
                                @if($actualizacion->id_show === 0)
                                    <div class="fondoContenido col-sm-6">
                                        <p class="letraTexto">{{substr($actualizacion->fecha, 0,10)}}</p>
                                        <h3 class="letraTitulo">{{$banda->nombre}}</h3>
                                        <p class="letraTexto">{{$actualizacion->detalles}}</p>
                                        <a class="btn btn-danger btn-xs" href="{{ route('banda/ver',['id' => $banda->id] )}}" >Ver</a>
                                        <?php $existeNoticiaBanda = 1?>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                    @if($existeNoticiaBanda == 0)
                        <h4 class="letraTexto">Actualmente no existen noticias sobre bandas en esta region</h4>
                    @endif
                </div>
                <div class="col-sm-6">
                    <?php $existeNoticiaShow = 0?>
                    <p class="titulo letraTitulo">Shows:</p>
                    @foreach($actualizaciones as $actualizacion)
                        @foreach($bandas as $banda)
                            @if($banda->id == $actualizacion->id_banda)
                                @if($actualizacion->id_show > 0)
                                    <div class="fondoContenido col-sm-6">
                                        <p class="letraTexto">{{substr($actualizacion->fecha, 0,10)}}</p>
                                        <h3 class="letraTitulo">{{$banda->nombre}}</h3>
                                        <p class="letraTexto">{{$actualizacion->detalles}}</p>
                                    <button class="btn btn-danger btn-xs"  onclick="verShow({{$actualizacion->id_show}})" >Ver</button>
                                        <?php $existeNoticiaShow = 1?>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                    @if($existeNoticiaShow == 0)
                        <h4 class="letraTexto">Actualmente no existen noticias sobre shows en esta region</h4>
                    @endif
                </div>
            </div>
        </div>
        <div id="responsive-modal" class="modal fade" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content fondoContenido letraTitulo">
                    <div class="modal-header">
                        <h4 color="black" class="titulo">Informacion Show</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <strong>Nombre:</strong>
                            <span id="nombreShow"></span>
                        </div>
                        <div class="row">
                            <strong>Ciudad:</strong>
                            <span id="ciudadShow"></span>
                        </div>
                        <div class="row">
                            <strong>Fecha/Hora Inicio:</strong>
                            <span id="fechaShow"></span>
                        </div>
                        <div class="row">
                            <strong>Informacion:</strong>
                            <span id="infShow"></span>
                        </div>
                        <div class="row">
                            <strong>Valor:</strong>
                            <span id="valor"></span>
                        </div>
                        <div class="row">
                            <strong>Mas Informacion visitar:</strong>
                            <span id="facebook"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dafault letraPortada" data-dismiss="modal">Salir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    


@endsection
@section('scripts')
    <script>
        function verShow(valor) {
            $('#responsive-modal').modal('show');
            var BASEURL = '{{ url('/') }}';
            $.ajax({
                url: BASEURL+'/show/'+valor ,
                type : 'GET',
                success: function(result){
                    console.log(result);
                    $('#nombreShow').text(result[0].title);
                    $.ajax({
                        url: BASEURL+'/ciudad/'+result[0].id_ciudad,
                        type: 'GET',
                        success: function(data){
                            $('#ciudadShow').text(data[0].nombre);
                        },
                        error: function(){
                            console.log('Error');
                        }
                    });
                    
                    $('#fechaShow').text(result[0].start);
                    $('#infShow').text(result[0].informacion);
                    $('#valor').text(result[0].precio);
                    $('#facebook').text(result[0].link);
                },
                error: function(){
                    console.log('Error:');
                }
            });
        }
    </script>
@endsection
