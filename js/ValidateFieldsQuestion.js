$(document).ready(function(){
	$('#email').keyup(function () {
		var input = $('#email').val();
		var eralumno = /^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es)$/;
		var erprofesor = /^[a-z]+\.*[a-z]+@ehu\.(eus|es)$/;
		if(input.length==0){
			$('#eemail').html("<span style='color:red;'>&#10060; El campo email no puede estar vacío.</span>");
			return false;
		}
		else if(!(eralumno.test(input)) && !(erprofesor.test(input))){
			$('#eemail').html("<span style='color:red;'>&#10060; El campo email no tiene el formato de EHU.</span>");
			return false;
		}
		else{
			$('#eemail').html("<span style='color:green;'>&#9989;</span>");
			return true;
		}
	});

	$('#enunciado').keyup(function () {
		var input = $('#enunciado').val();
		if(input.length==0){
			$('#eenunciado').html("<span style='color:red;'>&#10060; El campo enunciado no puede estar vacío.</span>");
			return false;
		}else if(input.length<10){
			$('#eenunciado').html("<span style='color:red;'>&#10060; El campo enunciado no puede tener menos de 10 caracteres.</span>");
			return false;
		}else{
			$('#eenunciado').html("<span style='color:green;'>&#9989;</span>");
			return true;
		}
	});

	$('#correcta').keyup(function () {
		var input = $('#correcta').val();
		if(input.length==0){
			$('#ecorrecta').html("<span style='color:red;'>&#10060; Este campo no puede estar vacío.</span>");
			return false;
		}else{
			$('#ecorrecta').html("<span style='color:green;'>&#9989;</span>");
			return true;
		}
	});

	$('#incorrecta1').keyup(function () {
		var input = $('#incorrecta1').val();
		if(input.length==0){
			$('#eincorrecta1').html("<span style='color:red;'>&#10060; Este campo no puede estar vacío.</span>");
			return false;
		}else{
			$('#eincorrecta1').html("<span style='color:green;'>&#9989;</span>");
			return true;
		}
	});

	$('#incorrecta2').keyup(function () {
		var input = $('#incorrecta2').val();
		if(input.length==0){
			$('#eincorrecta2').html("<span style='color:red;'>&#10060; Este campo no puede estar vacío.</span>");
			return false;
		}else{
			$('#eincorrecta2').html("<span style='color:green;'>&#9989;</span>");
			return true;
		}
	});

	$('#incorrecta3').keyup(function () {
		var input = $('#incorrecta3').val();
		if(input.length==0){
			$('#eincorrecta3').html("<span style='color:red; text-align:right;'>&#10060; Este campo no puede estar vacío.</span>");
			return false;
		}else{
			$('#eincorrecta3').html("<span style='color:green; text-align:right;'>&#9989;</span>");
			return true;
		}
	});

	$('#tema').keyup(function () {
		var input = $('#tema').val();
		if(input.length==0){
			$('#etema').html("<span style='color:red;'>&#10060; El tema no puede estar vacío.</span>");
			return false;
		}else{
			$('#etema').html("<span style='color:green;'>&#9989;</span>");
			return true;
		}
	});
	
	
	$("form").submit(function (e) {
		var inputemail = $('#email').val();
		var eralumno = /^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es)$/;
		var erprofesor = /^[a-z]+\.*[a-z]+@ehu\.(eus|es)$/;
		var error = false;
		var mensajeerror="Se han encontrado los siguientes errores:\n";
		if(inputemail.length==0){
			error = true;
			mensajeerror=mensajeerror+'-El campo email no puede estar vacío.\n';
			e.preventDefault();
		}
		else if(!(eralumno.test(inputemail)) && !(erprofesor.test(inputemail))){
			error = true;
			mensajeerror=mensajeerror+'-El campo email no tiene el formato de EHU.\n';
			e.preventDefault();
		}
		var inputenunciado = $('#enunciado').val();
		if(inputenunciado.length==0){
			error = true;
			mensajeerror=mensajeerror+'-El campo enunciado no puede estar vacío.\n';
			e.preventDefault();
		}else if(inputenunciado.length<10){
			error = true;
			mensajeerror=mensajeerror+'-El campo enunciado no puede tener menos de 10 caracteres.\n';
			e.preventDefault();
		}
		var inputcorrecta = $('#correcta').val();
		if(inputcorrecta.length==0){
			error = true;
			mensajeerror=mensajeerror+'-El campo respuesta correcta no puede estar vacío.\n';
			e.preventDefault();
		}
		var inputincorrecta1 = $('#incorrecta1').val();
		if(inputincorrecta1.length==0){
			error = true;
			mensajeerror=mensajeerror+'-El campo respuesta incorrecta 1 no puede estar vacío.\n';
			e.preventDefault();
		}
		var inputincorrecta2 = $('#incorrecta2').val();
		if(inputincorrecta2.length==0){
			error = true;
			mensajeerror=mensajeerror+'-El campo respuesta incorrecta 2 no puede estar vacío.\n';
			e.preventDefault();
		}
		var inputincorrecta3 = $('#incorrecta3').val();
		if(inputincorrecta3.length==0){
			error = true;
			mensajeerror=mensajeerror+'-El campo respuesta incorrecta 3 no puede estar vacío.\n';
			e.preventDefault();
		}
		var inputtema = $('#tema').val();
		if(inputtema.length==0){
			error = true;
			mensajeerror=mensajeerror+'-El campo tema no puede estar vacío.\n';
			e.preventDefault();
		}
		var inputtema = $('#file').val();
		if($('#file').get(0).files.length == 0){
			error = true;
			mensajeerror=mensajeerror+'-El campo foto no puede estar vacío.\n';
			e.preventDefault();
		}
		
		if(error){
			alert(mensajeerror);
		}
	});
});

