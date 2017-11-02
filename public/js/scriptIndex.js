var regionActual;

function getRegion() {
    return leerCookie("idRegion");
}
function setRegion(id, name) {
    document.cookie="idRegion ="+id;
    document.cookie="nameRegion ="+name;
   // alert("Se guardo la cookie "+leerCookie("nameRegion")+" con el valor de "+leerCookie("idRegion"));
}

function leerCookie(nombre) {
    var lista = document.cookie.split(";");
    for (i in lista) {
        var busca = lista[i].search(nombre);
        if (busca > -1) {micookie=lista[i]}
    }
    var igual = micookie.indexOf("=");
    var valor = micookie.substring(igual+1);
    return valor;
}

function actualizarSeleccionImagen() {
    if($("#region").val()=== "1"){
        $("#imgRegion").empty();
        $("#imgRegion").load("js/imagenes.html #1");
        setRegion("1", "Tarapacá");
    }else if($("#region").val()=== "2"){
        $("#imgRegion").empty();
        $("#imgRegion").load("js/imagenes.html #2");
        setRegion("2", "Antofagasta");
    }else if($("#region").val()=== "3"){
        $("#imgRegion").empty();
        $("#imgRegion").load("js/imagenes.html #3");
        setRegion("3", "Atacama");
    }else if($("#region").val()=== "4"){
        $("#imgRegion").empty();
        $("#imgRegion").load("js/imagenes.html #4");
        setRegion("4", "Coquimbo");
    }else if($("#region").val()=== "5"){
        $("#imgRegion").empty();
        $("#imgRegion").load("js/imagenes.html #5");
        setRegion("5", "Valparaiso");
    }else if($("#region").val()=== "6"){
        $("#imgRegion").empty();
        $("#imgRegion").load("js/imagenes.html #6");
        setRegion("6", "O'Higgins");
    }else if($("#region").val()=== "7"){
        $("#imgRegion").empty();
        $("#imgRegion").load("js/imagenes.html #7");
        setRegion("7", "Maule");
    }else if($("#region").val()=== "8"){
        $("#imgRegion").empty();
        $("#imgRegion").load("js/imagenes.html #8");
        setRegion("8", "Biobío");
    }else if($("#region").val()=== "9"){
        $("#imgRegion").empty();
        $("#imgRegion").load("js/imagenes.html #9");
        setRegion("9", "Araucania");
    }else if($("#region").val()=== "10"){
        $("#imgRegion").empty();
        $("#imgRegion").load("js/imagenes.html #10");
        setRegion("10", "Los lagos");
    }else if($("#region").val()=== "11"){
        $("#imgRegion").empty();
        $("#imgRegion").load("js/imagenes.html #11");
        setRegion("11", "Aisén");
    }else if($("#region").val()=== "12"){
        $("#imgRegion").empty();
        $("#imgRegion").load("js/imagenes.html #12");
        setRegion("12", "Magallanes");
    }else if($("#region").val()=== "13"){
        $("#imgRegion").empty();
        $("#imgRegion").load("js/imagenes.html #13");
        setRegion("13", "Santiago");
    }else if($("#region").val()=== "14"){
        $("#imgRegion").empty();
        $("#imgRegion").load("js/imagenes.html #14");
        setRegion("14", "Los Rios");
    }else if($("#region").val()=== "15"){
        $("#imgRegion").empty();
        $("#imgRegion").load("js/imagenes.html #15");
        setRegion("15", "Arica");
    }
}