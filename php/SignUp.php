<!DOCTYPE html>
<html>

<head>
  <?php include '../html/Head.html' ?>
  <?php include '../php/DbConfig.php' ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="../js/ValidateSignUp.js"></script>
  <script src="../js/ShowImageInForm.js"></script>

</head>

<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
    <form method="POST" action="" id='fsignup' name='fsignup' enctype="multipart/form-data" accept-charset="UTF-8">
			Email*: <input type="text" id="email" name="email" size=35><span id="eemail"></span><br>
			Nombre y Apellidos*: <input type="text" id="nombre" name="nombre" size=55><span id="enombre"></span><br>
			Contraseña*: <input type="password" id="pass1" name="pass1" size=55><span id="epass1"></span><br>
			Repetir Contraseña*: <input type="password" id="pass2" name="pass2" size=55><span id="epass2"></span><br>
			Tipo de Usuario*: <input type="radio" name="typeuser" value="1" id="typeuser" checked> Alumno 
											<input type="radio" name="typeuser" value="2" id="typeuser"> Profesor <br> 
			Imagen: <input type="file" id="file" accept="image/*" name="foto" onchange="verImagen(event)"><br><img id="imagen" name="imagen" width="100"/><br>
			<p style="text-align:center;"><input type="submit" id="enviar" name="enviar" value="Enviar"></p>	
		</form>
    </div>
    <?php
    echo "<div>";
    $validacion=false;
      if(isset($_POST['enviar'])){
        $validacion = validar($_POST['email'],$_POST['nombre'], $_POST['pass1'], $_POST['pass2'], $_POST['typeuser']);
        if($validacion){

        }
      }


      function validar($email, $nombre, $pass1, $pass2, $typeuser){
        $passlength=strlen($pass1);
        if(strlen($nombre) == 0 || strlen($pass1) == 0 || strlen($pass2) == 0){
          echo "<p>Algunos campos estan vacíos.</p>";
          return false;
        }
        if(preg_match("/^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es)$/",$email)==0 && preg_match("/^[a-z]+\.*[a-z]+@ehu\.(eus|es)$/", $email)==0){
          echo "<p>Fallo en el email</p>";
          return false;
        }
        if($pass1!=$pass2){
          echo "<p>Las contraseñas no coinciden.</p>";
          return false;
        }
        if($passlength < 6){
          echo "<p>Contraseña demasiado corta.</p>";
          return false;
        }
        $valores = array('valores'=>array('min_range'=>1,'max_range'=>2));
        if(filter_var($typeuser, FILTER_VALIDATE_INT, $valores ) == false){
                  echo"<p>Fallo en el tipo de usuario.</p>";
                  return false;
              }
        
        return true;
      }
      echo "</div>";
      if($validacion){
        echo "	<div style='color:white; background-color:#00cc66'>
            <strong>¡Registro realizado con éxito!</strong> Para entrar <a href='../php/LogIn.php' class='alert-link'>pulsa aquí.</a>.
            </div>
          ";
      }
    ?>
  </section>
  <?php include '../html/Footer.html' ?>
</body>

</html>