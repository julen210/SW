$(document).ready(function() {   
	$("#boton").click(function(){
		var mail = $("#email").val();
		if(mail.length==0){
			$("#tlf").val("");
			$("#nombre").val("");
			$("#apellidos").val("");
			alert("No se ha introducido un email.");
		}else{
			$.get('../xml/Users.xml', function(d){    
				var listacorreos = $(d).find('email');
				var listanombres = $(d).find('nombre');
				var listaapellido1 = $(d).find('apellido1');
				var listaapellido2 = $(d).find('apellido2');
				var listatlf = $(d).find('telefono');
				var encontrado = 0;
				for (var i = 0; i < listacorreos.length; i++){
					if(listacorreos[i].childNodes[0].nodeValue == mail){
						encontrado = 1;
						$("#tlf").val(listatlf[i].childNodes[0].nodeValue);
						$("#nombre").val(listanombres[i].childNodes[0].nodeValue);
						$("#apellidos").val(listaapellido1[i].childNodes[0].nodeValue + " " + listaapellido2[i].childNodes[0].nodeValue);
					}
				}
				if(encontrado == 0){
					alert('No existe el email especificado en la base de datos, introduzca otro.');
				}
			})
		}
	});
}); 
 