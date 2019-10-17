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
    <?php
		$mysql = mysqli_connect($server, $user, $pass, $basededatos);
		if(isset($_POST['enviar'])) {
			$imagen = $_FILES['foto']['name'];
			$imagenTMP = $_FILES['foto']['tmp_name'];
			$carpeta = "A:/xampp/htdocs/Proyecto/images/";
			move_uploaded_file($imagenTMP, $carpeta.$imagen);
			$sql="INSERT INTO preguntas (ID, email, enunciado, r_correcta, r_in1, r_in2, r_in3, complejidad, tema, img) VALUES
			(NULL, '$_POST[email]','$_POST[enunciado]', '$_POST[correcta]', '$_POST[incorrecta1]', '$_POST[incorrecta2]', '$_POST[incorrecta3]',
			'$_POST[complejidad]', '$_POST[tema]', '$imagen')";
		}

		
      if (!mysqli_query($mysql ,$sql))
      {
        die('<div style="color:white; background-color:#ff0000">Error en el servidor, inténtalo otra vez <a href="../php/QuestionFormWithImage.php" class="alert-link">aquí.</a></div>');
      }
      mysqli_close($mysql);
      
    ?>
   
    </div>
    <div style="color:white; background-color:#00cc66">
    <strong>Pregunta guardada con éxito!</strong> Para ver el resto de preguntas <a href="../php/ShowQuestions.php" class="alert-link">pulsa aquí.</a>.
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
