$(document).ready(function(){
	$("#ver").click(function (event) {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				mostrar(this);
			}
		};
		xhttp.open("GET", "../xml/Questions.xml", true);
		xhttp.send();
		function mostrar(xml){
			var i;
			var xmlDoc = xml.responseXML;
			var tabla="<table border=1><thead><tr><th>Author</th><th>Enunciado</th><th>Respuesta Correcta</th></tr></thead>";
			var x = xmlDoc.getElementsByTagName("assessmentItem");
			for (i = 0; i <x.length; i++) { 
				tabla += "<tr><td>" +
				x[i].getAttribute('author') +
				"</td><td>" +
				x[i].getElementsByTagName('p')[0].childNodes[0].nodeValue +
				"</td><td>" +
				x[i].getElementsByTagName('value')[0].childNodes[0].nodeValue +
				"</td></tr>";
			}
			tabla+="</table>";
			$("#vertabla").append(tabla);
		}
    });
});

