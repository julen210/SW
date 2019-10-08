<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/ValidateFieldsQuestion.js"></script>
  <script src="../js/ShowImageInForm.js"></script>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div style="border-style:solid;border-color:black; font-family: Verdana,Geneva,sans-serif; text-align:left;"> <p style="text-align:center;">DATOS DE LA PREGUNTA</p>
		<form id='fquestion' name='fquestion' action='AddQuestion.php'>
			Email*: <input type="email" id="email" size=35 required><span id="eemail"></span><br>
			Enunciado de la pregunta*: <input type="text" id="enunciado" size=55 required><span id="eenunciado"></span><br>
			Respuesta correcta*: <input type="text" id="correcta" size=55 required><span id="ecorrecta"></span><br>
			Respuesta incorrecta 1*: <input type="text" id="incorrecta1" size=55 required><span id="eincorrecta1"></span><br>
			Respuesta incorrecta 2*: <input type="text" id="incorrecta2" size=55 required><span id="eincorrecta2"></span><br>
			Respuesta incorrecta 3*: <input type="text" id="incorrecta3" size=55 required><span id="eincorrecta3"></span><br>
			Complejidad de la pregunta*:	<input type="radio" name="complejidad" value="1" id="complejidad" checked required> Baja 
											<input type="radio" name="complejidad" value="2" id="complejidad"> Media 
											<input type="radio" name="complejidad" value="3" id="complejidad"> Alta <br>
			Tema de la pregunta*: <input type="text" name="tema" id="tema" size=55 required><span id="etema"></span><br>
			Imagen relacionada con la pregunta*: <input type="file" accept="image/*" onchange="verImagen(event)"><br><img id="imagen" width="100"/><br>
			<p style="text-align:center;"><input type="submit" value="Enviar"></p>	
		</form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
