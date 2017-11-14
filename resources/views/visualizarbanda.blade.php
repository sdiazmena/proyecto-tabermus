@extends('layouts.prueba')

@section('content')
    <div class="col-sm-8 bloqueContenido">
        <h1 class="titulo text-center letraTitulo">{{ $banda->nombre }} Perfil</h1>
        <div class="fondoContenido letraTitulo">
            <ul class="nav nav-tabs">
                <li class="active"><a href="{{$rutaPerfil}}">Perfil</a></li>
                <li><a href="{{$rutaHistoria}}">Historia</a></li>
                <li><a href="{{$rutaDiscos}}">Musica y Discos</a></li>
                <li><a href="{{$rutaFechas}}">Fechas</a></li>
            </ul>

            <div class="row featurette">
                <div class="col-md-6">
                    <h1 class="titulo letraTitulo">{{$banda->nombre}} </h1>
                    <h4 class="letraTexto"><strong>Region:</strong> {{ $region->nombre }}</h4>
                    <h4 class="letraTexto"><strong>Ciudad:</strong> {{ $ciudad->nombre }}</h4>
                    <h4 class="letraTexto"><strong>Genero:</strong> {{ $genero->nombre }}</h4>
                    <h4 class="letraTexto"><strong>Lirica:</strong> {{ $lirica->nombre }}</h4>
                    <h4 class="letraTexto"><strong>¿Quienes Somos?:</strong> {{ $banda->descripcion}}</h4>

                    <?php $redesSociales = 0?>

                    @if($banda->facebook)
                        <p class="lead"><img class="media-object" src="https://www.facebook.com/images/fb_icon_325x325.png" alt="..." height= "30px"><a href="{{$banda->facebook}}">{{$banda->facebook}}</a></p>
                        {{$redesSociales = $redesSociales +1}}
                    @endif

                    @if($banda->youtube)
                        <p class="lead"><img class="media-object" src="https://www.gstatic.com/images/icons/material/product/2x/youtube_64dp.png" alt="..." height= "30px"><a href="{{$banda->youtube}}">{{$banda->youtube}}</a></p>
                        {{$redesSociales = $redesSociales +1}}
                    @endif

                    @if($banda->instagram)
                        <p class="lead"><img class="media-object" src="https://instagram-brand.com/wp-content/themes/ig-branding/assets/images/ig-logo-email.png" alt="..." height= "30px"><a href="{{$banda->instagram}}">{{$banda->instagram}}</a></p>
                        {{$redesSociales = $redesSociales +1}}
                    @endif

                    @if($banda->spotify)
                        <p class="lead"><img class="media-object" src="https://lh3.googleusercontent.com/UrY7BAZ-XfXGpfkeWg0zCCeo-7ras4DCoRalC_WXXWTK9q5b0Iw7B0YQMsVxZaNB7DM=w300" alt="..." height= "30px"><a href="{{$banda->spotify}}">{{$banda->spotify}}</a></p>
                        {{$redesSociales = $redesSociales +1}}
                    @endif

                    @if($banda->twitter)
                        <p class="lead"><img class="media-object" src="http://www.espiritudeportivo.es/images/twitter-contacto.png" alt="..." height= "30px"><a href="{{$banda->twitter}}">{{$banda->twitter}}</a></p>
                        {{$redesSociales = $redesSociales +1}}
                    @endif

                    @if($banda->soundcloud)
                        <p class="lead"><img class="media-object" src="http://industriamusical.es/wp-content/uploads/2014/05/soundcloud-icon.png" alt="..." height= "30px"><a href="{{$banda->soundcloud}}">{{$banda->soundcloud}}</a></p>
                        {{$redesSociales = $redesSociales +1}}
                    @endif

                    @if($redesSociales == 0)
                    <h4 class="letraTexto"><strong>Redes Sociales:</strong> Actualmente no registrados en esta banda</h4>
                    @endif
                </div>
                <div class="col-md-6">
                    <br>
                    <img src="http://localhost/tabermus/public/{{$banda->imagen}}" class="img-responsive fondoContenido" style="width:100%" alt="Image">
                </div>
            </div>
            <hr class="featurette-divider">
        </div>
    </div>
@endsection
