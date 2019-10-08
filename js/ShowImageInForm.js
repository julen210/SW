var verImagen = function(event) {
	$("#imagen").attr("src", URL.createObjectURL(event.target.files[0]));
};