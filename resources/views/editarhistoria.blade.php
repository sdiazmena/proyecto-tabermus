@extends('layouts.prueba')

@section('content')    
    <div class="col-sm-8 bloqueContenido">
        <h1 class="titulo letraTitulo text-center">{{ $banda->nombre }} Perfil</h1>
        <div class="fondoContenido">
            <ul class="nav nav-tabs">
                <li><a href="/tabermus/public/profile/banda/{{$banda->id}}/edit">Perfil</a></li>
                <li class="active"><a href="/tabermus/public/profile/banda/{{$banda->id}}/historia">Historia</a></li>
                <li><a href="/tabermus/public/profile/banda/{{$banda->id}}/discos">Musica y Discos</a></li>
                <li><a href="/tabermus/public/profile/banda/{{$banda->id}}/fechas">Fechas</a></li>
            </ul>
            
                <hr class="featurette-divider">
               
                        <h3 class="letraTitulo">    Historia de {{ $banda->nombre }}</h3>

                        <p>{{ $banda->historia}}</p>
                    
                    <a id="editar"  class="btn btn-danger">Actualizar Historia</a>

                <hr class="featurette-divider">
            {!! Form::open(['url' => '/profile/banda/'.$banda->id.'/historia/update','method' => 'POST']) !!}
            {{csrf_field()}}
            <div id="responsive-modal" class="modal fade" tabindex="-1" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content fondoContenido letraTitulo">
                        <div class="modal-header">
                            <h4 color="black" class="titulo">Editar Historia Banda</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">                                
                                {!! Form::textarea('historia', $banda->historia, ['class' => 'form-control', 'placeholder' => 'Historia de la banda...', 'value' => '{{$banda->historia}}']) !!}
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dafault letraPortada" data-dismiss="modal">CANCELAR</button>
                            {!! Form::submit('Actualizar', ['class' => 'btn btn-success']) !!}
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
            
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    $(document).ready(function() {

        $('#editar').on('click', function(){
            $('#responsive-modal').modal('show');
        });
    });
    </script>
@endsection