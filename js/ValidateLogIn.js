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

	$('#password').keyup(function () {
		var input = $('#pass1').val();
		if(input.length==0){
			$('#epass').html("<span style='color:red;'>&#10060; Este campo no puede estar vacío.</span>");
			return false;
		}else if(input.length < 6){
			$('#epass').html("<span style='color:red;'>&#10060; La contraseña es demasiado corta.</span>");
			return false;
		}else{
			$('#epass').html("<span style='color:green;'>&#9989;</span>");
			return true;
		}
	});

});

