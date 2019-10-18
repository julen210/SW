var verImagen = function(event) {
	/*if (input.files && input.files[0]) {
         var reader = new FileReader();
        reader.onload = function (e) {
            $('#fotomostrar').remove();
            $('#saltoFoto').remove();
            $('<img id="fotomostrar" width = "100px" height = "100px"/><br id = "saltoFoto">').insertBefore($('#enviar'));
            $('#fotomostrar').attr('src', e.target.result);           
        };
         reader.readAsDataURL(input.files[0]);
    }*/
	
	$("#imagen").attr("src", URL.createObjectURL(event.target.files[0]));
};