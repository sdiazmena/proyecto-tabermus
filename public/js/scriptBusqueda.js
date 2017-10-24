$(document).ready(function(){
    $(tuRegion).click(function(){
        alert("hola");
        $("#contenidoMostrar").empty();
        $("#contenidoMostrar").load("elementosFiltrado.php #regionGenerico");
        $("#resultadoBusqueda").load("elementosBusqueda.html #busquedaRegionalGenero");
    });
    $(nacional).click(function(){
        $("#contenidoMostrar").empty();
        $("#contenidoMostrar").load("elementosBusqueda.html #nacionalGenerico");
        $("#resultadoBusqueda").load("elementosBusqueda.html #busquedaNacionalGenero");
    });

});

function desbloquearRegionalOpcional() {
    $("#filtradoOpcionalRegional").empty();
    $("#filtradoOpcionalRegional").append("<select><option>Todo</option><option>1</option><option>2</option><option>3</option><option>4</option></select>");
}

function desbloquearNacionalOpcional() {
    $("#filtradoOpcionalNacional").empty();
    $("#filtradoOpcionalNacional").append("<select><option>Todo</option><option>1</option><option>2</option><option>3</option><option>4</option></select>");
}

function actualizarRegion(){
    $("#resultadoBusqueda").empty();
    $("#resultadoBusqueda").load("elementosBusqueda.html #busquedaRegionalGenero");
}

function actualizarRegion(){
    $("#resultadoBusqueda").empty();
    $("#resultadoBusqueda").load("elementosBusqueda.html #busquedaRegionalGenero");
}

function actualizarNacional(){
    $("#resultadoBusqueda").empty();
    $("#resultadoBusqueda").load("elementosBusqueda.html #busquedaNacionalGenero");
}