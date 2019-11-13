function mostrarTabla(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			mostrar(this);
		}
	};
	xhttp.open("GET", "../xml/Questions.xml", true);
	xhttp.send();
	function mostrar(xml){
		document.getElementById("vertabla").innerHTML='';//empty
		document.getElementById("vermensajes").innerHTML='';//empty
		var i;
		var xmlDoc = xml.responseXML;
		var tabla="<table border=1><thead><tr><th>Author</th><th>Enunciado</th><th>Respuesta Correcta</th></tr></thead>";
		var x = xmlDoc.documentElement.getElementsByTagName("assessmentItem");
		for (i = 0; i <x.length; i++) { 
			tabla += "<tr><td>" +
			x[i].getAttribute('author') +
			"</td><td>" +
			x[i].getElementsByTagName('p')[0].childNodes[0].nodeValue +
			"</td><td>" +
			x[i].getElementsByTagName('value')[0].childNodes[0].nodeValue +
			"</td></tr>";
		}
		tabla+="</table>";//append tabla
		document.getElementById('vertabla').innerHTML=tabla;
	}
}


function num_preguntas(){
	var parcial=0;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			x=xhttp.responseXML.documentElement.getElementsByTagName("assessmentItem");
			var autor=document.getElementById("email").value;
			for (i=0;i<x.length;i++){
				var autorpregunta=x[i].getAttribute("author");
				if (autorpregunta==autor){
					parcial=parcial+1;
				}		
			}
			texto=parcial+"/"+x.length;
			document.getElementById("numeropreguntas").innerHTML=texto;
		}
	}
	xhttp.open("GET","../xml/Questions.xml",true);
	xhttp.send();	
};

