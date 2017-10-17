$(document).ready(function () {
   $('#agregarGenero').click(function () {
       var tablaElementos = document.getElementById('tabla-genero');
       var txtTitulo = document.getElementById('generoSeleccionado');
       var datos = [];
       var comprobar = 'Seleccione Genero';

       if (!txtTitulo.value || !txtTitulo.value.trim().length) {
           alert('Seleccione un Genero');
           return;
       }
       if (!comprobar.localeCompare(txtTitulo.value)) {
           alert('Seleccione un Genero');
           return;
       }

       agregarElementos(tablaElementos, txtTitulo, datos);


   });

   $('#agregarIntegrates').click(function () {
       var tablaElementos = document.getElementById('tabla-integrantes');
       var txtTitulo = document.getElementById('Integrantes');
       var datos = [];
       var comprobar = '';

       if (!txtTitulo.value || !txtTitulo.value.trim().length) {
           alert('Escriba un nombre valido');
           return;
       }
       if (!comprobar.localeCompare(txtTitulo.value)) {
           alert('Escriba un nuevo integrantes');
           return;
       }

       agregarElementos(tablaElementos, txtTitulo, datos);
   });

   $('#agregarlirica').click(function () {
       var tablaElementos = document.getElementById('tabla-lirica');
       var txtTitulo = document.getElementById('liricaSeleccionado');
       var datos = [];
       var comprobar = 'Seleccione Lirica';

       if (!txtTitulo.value || !txtTitulo.value.trim().length) {
           alert('Seleccione un Lirico');
           return;
       }
       if (!comprobar.localeCompare(txtTitulo.value)) {
           alert('Seleccione un Lirica');
           return;
       }

       agregarElementos(tablaElementos, txtTitulo, datos);
   });

    $(document).on('click', '.borrar', function (event) {
        event.preventDefault();
        $(this).closest('tr').remove();
    });

});

function agregarElementos(tablaElementos, txtTitulo, datos) {

    var titulo = txtTitulo.value;
    txtTitulo.value = '';
    txtTitulo.focus();

    var item = {
        titulo: titulo.trim()
    };
    datos.push(item);


    for (var i = 0; i < datos.length; i++) {

        var elemento = datos[i];
        var tr = document.createElement('tr');
        var td1 = document.createElement('td');
        var td4 = document.createElement('td');

        tr.appendChild(td1);
        tr.appendChild(td4);

        var eliminar = document.createElement("a");
        var text = document.createTextNode("x");
        eliminar.appendChild(text);
        eliminar.className = "borrar";
        eliminar.href = "#";
        tr.appendChild(eliminar);

        td1.textContent = elemento.titulo;

        tablaElementos.appendChild(tr);

    }
}