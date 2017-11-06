function actualizarBarraRegion(valor) {
    //alert(valor);
    $("#barraRegionesTop").empty();
    $("#img2").empty();
    //$('#img2').load("js/imagenes.html #portada"+id);
    if(!(valor === "1")){
        $("#barraRegionesTop").append("<li><a href=\"home\" onclick=\"setRegion('1','Tarapacá')\">Tarapacá</a></li>");
    }
    if(!(valor === "2")){
        $("#barraRegionesTop").append("<li><a href=\"home\" onclick=\"setRegion('2','Antofagasta')\">Antofagasta</a></li>");
    }
    if(!(valor === "3")){
        $("#barraRegionesTop").append("<li><a href=\"home\" onclick=\"setRegion('3','Atacama')\">Atacama</a></li>");
    }
    if(!(valor === "4")){
        $("#barraRegionesTop").append("<li><a href=\"home\" onclick=\"setRegion('4','Coquimbo')\">Coquimbo</a></li>");
    }
    if(!(valor === "5")){
        $("#barraRegionesTop").append("<li><a href=\"home\" onclick=\"setRegion('5','Valparaiso')\">Valparaiso</a></li>");
    }
    if(!(valor === "6")){
        $("#barraRegionesTop").append("<li><a href=\"home\" onclick=\"setRegion('6','O\\'Higgins')\">O'Higgins</a></li>");
    }
    if(!(valor === "7")){
        $("#barraRegionesTop").append("<li><a href=\"home\" onclick=\"setRegion('7','Maule')\">Maule</a></li>");
    }
    if(!(valor === "8")){
        $("#barraRegionesTop").append("<li><a href=\"home\" onclick=\"setRegion('8','Biobío')\">Biobío</a></li>");
    }
    if(!(valor === "9")){
        $("#barraRegionesTop").append("<li><a href=\"home\" onclick=\"setRegion('9','Araucania')\">Araucania</a></li>");
    }
    if(!(valor === "10")){
        $("#barraRegionesTop").append("<li><a href=\"home\" onclick=\"setRegion('10','Los Lagos')\">Los lagos</a></li>");
    }
    if(!(valor === "11")){
        $("#barraRegionesTop").append("<li><a href=\"home\" onclick=\"setRegion('11','Aisén')\">Aisén</a></li>");
    }
    if(!(valor === "12")){
        $("#barraRegionesTop").append("<li><a href=\"home\" onclick=\"setRegion('12','Magallanes')\">Magallanes</a></li>");
    }
    if(!(valor === "13")){
        $("#barraRegionesTop").append("<li><a href=\"home\" onclick=\"setRegion('13','Santiago')\">Santiago</a></li>");
    }
    if(!(valor === "14")){
        $("#barraRegionesTop").append("<li><a href=\"home\" onclick=\"setRegion('14','Los Rios')\">Los rios</a></li>");
    }
    if(!(valor === "15")){
        $("#barraRegionesTop").append("<li><a href=\"home\" onclick=\"setRegion('15','Arica')\">Arica</a></li>");
    }
}

function cargarPortada() {
    valor = leerCookie("id");
    valorImprimir = "img/region/portada"+valor+".jpg";
    $("#hola").append("<img id='portada1' class='img-responsive well' src="+valorImprimir +" class='img-thumbnail' style='width:820px; height: 350px'>");
}