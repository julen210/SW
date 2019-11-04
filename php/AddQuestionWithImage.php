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
    
    <?php
			function validar($email, $enunciado, $correcta, $incorrecta1, $incorrecta2, $incorrecta3, $complejidad, $tema){
				if(preg_match("/^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es)$/",$email)==0 && preg_match("/^[a-z]+\.*[a-z]+@ehu\.(eus|es)$/", $email)==0){
					echo "<p>Fallo en el email</p>";
					return false;
				}
				if(preg_match("/^.{10,}$/",$enunciado)==0){
					echo "<p>Algunos campos no cumplen las condiciones.</p>";
					return false;
				}
				$valores = array('valores'=>array('min_range'=>1,'max_range'=>3));
				if(filter_var($complejidad, FILTER_VALIDATE_INT, $valores ) == false){
					echo"<p>Fallo en la complejidad.</p>";
					return false;
				}
				if(strlen($correcta) == 0 || strlen($incorrecta1) == 0 || strlen($incorrecta2) == 0 || strlen($incorrecta3) == 0 || strlen($tema) == 0){
					echo "<p>Algunos campos estan vacíos.</p>";
					return false;
				}
				return true;
			}
		if($_POST){
			echo "<div>";
			$validacion = validar($_POST['email'],$_POST['enunciado'], $_POST['correcta'], $_POST['incorrecta1'], $_POST['incorrecta2'], $_POST['incorrecta3'],
			$_POST['complejidad'], $_POST['tema']);
			if($validacion){
				$mysql = mysqli_connect($server, $user, $pass, $basededatos);
				if(isset($_POST['enviar'])) {
					$imagen = $_FILES['foto']['name'];
					$imagenTMP = $_FILES['foto']['tmp_name'];
					$carpeta = "A:/xampp/htdocs/Proyecto/images/";
					move_uploaded_file($imagenTMP, $carpeta.$imagen);
				}
				$sql="INSERT INTO preguntas (ID, email, enunciado, r_correcta, r_in1, r_in2, r_in3, complejidad, tema, img) VALUES
				(NULL, '$_POST[email]','$_POST[enunciado]', '$_POST[correcta]', '$_POST[incorrecta1]', '$_POST[incorrecta2]', '$_POST[incorrecta3]',
				'$_POST[complejidad]', '$_POST[tema]', '$imagen')";
				if (!mysqli_query($mysql ,$sql)){
					die('<div style="color:white; background-color:#ff0000">Error en el servidor, inténtalo otra vez <a href="../php/QuestionFormWithImage.php" class="alert-link">aquí.</a></div>');
				}
				mysqli_close($mysql);
				
				//XML
				try{
					libxml_use_internal_errors(TRUE);
					$xml = simplexml_load_file('../xml/Questions.xml');
					$pregunta = $xml->addChild('assessmentItem');
					$pregunta->addAttribute('subject',$_POST['tema']);
					$pregunta->addAttribute('author',$_POST['email']);
					$enunciado = $pregunta->addChild('itemBody');
					$enunciado->addChild('p',$_POST['enunciado']);
					$correcta = $pregunta->addChild('correctResponse');
					$correcta->addChild('value',$_POST['correcta']);
					$incorrectas = $pregunta->addChild('incorrectResponse');
					$incorrectas->addChild('value',$_POST['incorrecta1']);
					$incorrectas->addChild('value',$_POST['incorrecta2']);
					$incorrectas->addChild('value',$_POST['incorrecta3']);
					$xml->asXML('../xml/Questions.xml');
					echo"	<div style='color:white; background-color:#00cc66'>
						<strong>¡Pregunta guardada con éxito en XML!</strong> Para ver el resto de preguntas <a href='../php/ShowXMLQuestions.php?email=".$_GET['email']."' class='alert-link'>pulsa aquí</a>.
						</div>
					";
				}catch(Exception $e){
					echo "<div style='color:white; background-color:#ff0000'>No se ha insertado la pregunta en XML, inténtelo otra vez <a href='../php/QuestionFormWithImage.php?email=".$_GET['email']."' class='alert-link'>aquí</a></div>";
				}
				//FIN XML
			}

			echo "</div>";
			if($validacion){
				echo "	<div style='color:white; background-color:#00cc66'>
						<strong>¡Pregunta guardada con éxito en BBDD!</strong> Para ver el resto de preguntas <a href='../php/ShowQuestionsWithImage.php?email=".$_GET['email']."' class='alert-link'>pulsa aquí.</a>.
						</div>
					";
			}else{
				echo "<div style='color:white; background-color:#ff0000'>Error en los campos, inténtalo otra vez <a href='../php/QuestionFormWithImage.php?email=".$_GET['email']."' class='alert-link'>aquí.</a></div>";
			}
		}else{
			echo "<div style='color:white; background-color:#ff0000'>No se ha insertado la pregunta en la BBDD, inténtelo otra vez <a href='../php/QuestionFormWithImage.php?email=".$_GET['email']."' class='alert-link'>aquí.</a></div>";
		}
    ?>
   
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>