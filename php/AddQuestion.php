<?php include '../php/Menus.php' ?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <?php include '../php/DbConfig.php' ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    
</head>
<body>
  <section class="main" id="s1">
    <div>
    <?php
		if(isset($_POST['enviar'])){
			$mysql = mysqli_connect($server, $user, $pass, $basededatos);
			$sql="INSERT INTO preguntas (ID, email, enunciado, r_correcta, r_in1, r_in2, r_in3, complejidad, tema) VALUES
			(NULL, '$_POST[email]','$_POST[enunciado]', '$_POST[correcta]', '$_POST[incorrecta1]', '$_POST[incorrecta2]', '$_POST[incorrecta3]',
			'$_POST[complejidad]', '$_POST[tema]')";
		}
      if (!mysqli_query($mysql ,$sql))
      {
        die('<div style="color:white; background-color:#ff0000">Error en el servidor, inténtalo otra vez <a href="../php/QuestionFormWithImage.php" class="alert-link">aquí.</a></div>');
      }
      mysqli_close($mysql);
      
    ?>
   
    </div>
    <div style="color:white; background-color:#00cc66">
    <strong>Pregunta guardada con éxito!</strong> Para ver el resto de preguntas <a href="../php/ShowQuestionsWithImage.php" class="alert-link">pulsa aquí.</a>.
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>