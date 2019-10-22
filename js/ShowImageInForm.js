var verImagen = function(event) {
	$("<br><img id='imagen' name='imagen' width='100' src=''/>").insertAfter("#file");
	var src = URL.createObjectURL(event.target.files[0]);
	$("#imagen").attr("src", src);
};