<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <?php include '../php/DbConfig.php' ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
		<div style="border-style:solid;border-color:black; font-family: Verdana,Geneva,sans-serif; text-align:center; width:50%; margin-left:auto; margin-right:auto;"> <p style="text-align:center;">INICIO DE SESIÓN</p><br>
		<form method="POST" action="AddQuestionWithImage.php" id='fquestion' name='fquestion' enctype="multipart/form-data" accept-charset="UTF-8">
			Email*: <br><input style="text-indent: 1em" type="text" id="email" name="email" size=35><br>
			Contraseña*: <br><input type="password" id="password" name="password" size=35><br><br>
			<p style="text-align:center;"><input type="submit" id="enviar" name="enviar" value="Enviar"></p>	
		</form>
	</div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>