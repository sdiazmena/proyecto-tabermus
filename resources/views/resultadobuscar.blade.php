<div class="fondoContenido" id="resultadoBusqueda">
    <h3 class="letraTitulo">Resultado para:</h3>
    <h3 id="tituloBusqueda" class="letraTitulo"></h3>
    <table class="table table-condensed table-striped table-bordered">
        <thead>
        <tr class="letraTitulo">
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Ciudad</th>
            <th>Region</th>
            <th>Genero</th>
        </tr>
        </thead>
        <tbody>
        @foreach($datos as $dato)
            <tr>
                <td>{{ $dato->nombre }}</td>
                <td>{{ $dato->id_lirica }}</td>
                <td>{{ $dato->id_ciudad }}</td>
                <td>{{ $dato->id_ciudad }}</td>
                <td>{{ $dato->id_genero }}</td>
                <td>
                    <a class="btn btn-danger btn-xs" href="{{ route('buscar/banda',['id' => $dato->id] )}}" >Ver</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>