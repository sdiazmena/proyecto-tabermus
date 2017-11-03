$(document).ready(function () {
$("#region").change(function(event){
	$.get("http://localhost/tabermus/public/profile/ciudades/"+event.target.value+"",function(response,region){

		console.log(response[1].nombre);
		for(i=0;i<response.length;i++){

			$("#ciudad").append("<option value='"+response[i].id+"'> "+response[i].nombre+" </option>");
		}
	});
});
});