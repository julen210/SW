$(document).ready(function(){
	$("#enviar").click(function (event) {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				enviarPreguntas(this);
			}
		};
		xhttp.open("GET", "../xml/Questions.xml", true);
		xhttp.send();
		function enviarPreguntas(xml){
			var i;
			var xmlDoc = xml.responseXML;
			var x = xmlDoc.getElementsByTagName("assessmentItem");
			var pregunta = xmlDoc.createElement("assessmentItem");
			pregunta.setAttribute("author",$("#email").val());
			pregunta.setAttribute("subject",$("#tema").val());
			var enunciado = xmlDoc.createElement("itemBody");
			var p = xmlDoc.createElement("p");
			p.createTextNode($("#enunciado").val());
			enunciado.appendChild(p);
			pregunta.appendChild(enunciado);
			var correctResponse = xmlDoc.createElement("correctResponse");
			var valorcorrecto = xmlDoc.createElement("value");
			valorcorrecto.createTextNode($("#correcta").val());
			correctResponse.appendChild(valorcorrecto);
			pregunta.appendChild(correctResponse);
			var incorrectResponses = xmlDoc.createElement("incorrectResponses");
			var valorIncorrecto1 = xmlDoc.createElement("value");
			valorIncorrecto1.createTextNode($("#incorrecta1").val());
			var valorIncorrecto2 = xmlDoc.createElement("value");
			valorIncorrecto2.createTextNode($("#incorrecta2").val());
			var valorIncorrecto3 = xmlDoc.createElement("value");
			valorIncorrecto3.createTextNode($("#incorrecta3").val());
			incorrectResponses.appendChild(valorIncorrecto1);
			incorrectResponses.appendChild(valorIncorrecto2);
			incorrectResponses.appendChild(valorIncorrecto3);
			pregunta.appendChild(incorrectResponses);
			xmlDoc.getElementsByTagName("assessmentItems")[0].appendChild(pregunta);
			var mensaje = "<div style='color:white; background-color:#00cc66'>¡Pregunta guardada con éxito en XML!</div>"
			$("#verTabla").empty();
			$("#verMensajes").append(mensaje);
			
		}
    });
 
	$("#reset").click(function (event) {
		$("#enunciado").val('');
		$("#correcta").val('');
		$("#incorrecta1").val('');
		$("#incorrecta2").val('');
		$("#incorrecta3").val('');
		$("#tema").val('');
		$("#complejidad").val(['1']);
		$("#file").val('');
		$("#imagen").attr("src", '');
		$('#vermensajes').empty();
		$('#vertabla').empty();
	});
});