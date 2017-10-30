function cargaContenidoNacional() {
    $("#contenidoMostrar").empty();
    $("#contenidoMostrar").load("js/elementosBusqueda.php #nacionalGenerico");
    $("#resultadoBusqueda").load("js/elementosBusqueda.php #busquedaNacionalGenero");
}

function cargaContenidoRegion() {
    $("#contenidoMostrar").empty();
    $('#contenidoMostrar').load('js/elementosBusqueda.php #regionGenerico');
    $("#resultadoBusqueda").load("js/elementosBusqueda.php #busquedaRegionalGenero");
}

function desbloquearRegionalOpcional() {
    $("#filtradoOpcionalRegional").empty();
    $("#filtradoOpcionalRegional").append("<select id=\"selectOpcionalRegional\" ><option>Todo</option><option>1</option><option>2</option><option>3</option><option>4</option></select>");
}

function desbloquearNacionalOpcional() {
    $("#filtradoOpcionalNacional").empty();
    $("#filtradoOpcionalNacional").append("<select id=\"selectOpcionalNacional\"><option>Todo</option><option>1</option><option>2</option><option>3</option><option>4</option></select>");
}

function actualizarRegion(){

    if($('#selectFiltradoRegional').val() === 'Genero'){
        if($('#selectOpcionalRegional').val() === 'Todo'){
            alert('filtrado genero con todo');
            $("#resultadoBusqueda").empty();
            $("#resultadoBusqueda").load("js/elementosBusqueda.php #busquedaRegionalGenero");
        }
        else {
            alert('filtrado genero con '+ $('#selectOpcionalRegional').val());
            $("#resultadoBusqueda").empty();
            $("#resultadoBusqueda").load("js/elementosBusqueda.php #busquedaRegionalGenero");
        }

    }

    else if($('#selectFiltradoRegional').val() === 'Alfabeticamente'){
        if ($('#selectOpcionalRegional').val() === 'Todo'){
            alert('filtrado aaa con todo');
            $("#resultadoBusqueda").empty();
            $("#resultadoBusqueda").load("js/elementosBusqueda.php #busquedaRegionalAlfabeticamente");
        }
        else {
            alert('filtrado aaa con '+ $('#selectOpcionalRegional').val());
            $("#resultadoBusqueda").empty();
            $("#resultadoBusqueda").load("js/elementosBusqueda.php #busquedaRegionalAlfabeticamente");
        }

    }
    else {
        alert('seleccione un filtrado');
    }
}

function actualizarNacional(){

    if($('#selectFiltradoNacional').val() === 'Genero'){

        if($('#selectOpcionalNacional').val() === 'Todo'){
            alert('Filtrado de genero, con todo incluido');
            $("#resultadoBusqueda").empty();
            $("#resultadoBusqueda").load("js/elementosBusqueda.php #busquedaNacionalGenero");
        }
        else{
            alert('filtrado de genero con'+ $('#selectOpcionalNacional').val());
            $("#resultadoBusqueda").empty();
            $("#resultadoBusqueda").load("js/elementosBusqueda.php #busquedaNacionalGenero");
        }

    }

    else if($('#selectFiltradoNacional').val() === 'Region'){
        if($('#selectOpcionalNacional').val() === 'Todo'){
            alert('filtrado region con todo');
            $("#resultadoBusqueda").empty();
            $("#resultadoBusqueda").load("js/elementosBusqueda.php #busquedaNacionalCiudad");
        }
        else {
            alert('filtrado region con '+ $('#selectOpcionalNacional').val());
            $("#resultadoBusqueda").empty();
            $("#resultadoBusqueda").load("js/elementosBusqueda.php #busquedaNacionalCiudad");
        }
    }

    else if($('#selectFiltradoNacional').val() === 'Alfabeticamente'){
        if($('#selectOpcionalNacional').val() === 'Todo'){
            alert('filtrado aaa con todo');
            $("#resultadoBusqueda").empty();
            $("#resultadoBusqueda").load("js/elementosBusqueda.php #busquedaNacionalCiudad");
        }
        else {
            alert('filtrado aaa con '+ $('#selectOpcionalNacional').val());
            $("#resultadoBusqueda").empty();
            $("#resultadoBusqueda").load("js/elementosBusqueda.php #busquedaNacionalCiudad");
        }
    }
    else {
        alert('seleccione un filtrado');
    }
}