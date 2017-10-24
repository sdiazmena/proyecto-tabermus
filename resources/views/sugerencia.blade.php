@extends('layouts.prueba')

@section('content')    
    <div class="col-sm-8 bloqueContenido">
            <h1 class="well text-center">¿Tienes alguna inquietud?:</h1>

        <div class="well">

            <p>Escribemos, estaremos atento a tus sugerencias, dudas o consultas. En Tabermus trabajamos en conjunto contigo para
            poder brindar un mejor servicio</p>

            <div class="form-group">
                <label for="usuario">Nombre:</label>
                <input type="text" class="form-control" id="usuarior" placeholder="Introduce tu nombre">
            </div>

            <div class="form-group">
                <label for="mail">Correo:</label>
                <input type="text" class="form-control" id="mail" placeholder="Introduce tu email">
            </div>

            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <select>
                    <option>Reclamo</option>
                    <option>Sugerencia</option>
                    <option>Otro</option>
                </select>
            </div>

            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea class="form-control" rows="5" id="comment" placeholder="Escribenos..."></textarea>
            </div>

            <button type="submit" class="btn btn-default">Enviar</button>
        </div>

    </div>
@endsection