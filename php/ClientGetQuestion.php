<!DOCTYPE html>
<html>
<head>
	<?php include '../html/Head.html'?>
	<?php include '../php/DbConfig.php' ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../js/ValidateLogIn.js"></script>
    
</head>
<body>
	<?php include '../php/Menus.php' ?>
	<section class="main" id="s1">
		<?php
		if(!isset($_GET['email'])){
			echo "<div style='color:white; background-color:#ff0000'>Para acceder a esta página se necesita haber iniciado sesión.</div>";
		}else{
			$conexion = mysqli_connect($server, $user, $pass, $basededatos);
			// Check connection
			if (!$conexion) {
				die('<div style="color:white; background-color:#ff0000">Error al conectar con la base de datos </div>');
			}

			$sql = "SELECT * FROM usuarios";
			$query = mysqli_query($conexion, $sql);

			if (mysqli_num_rows($query) > 0) {
				
				$encontrado = 0;
				while($row = mysqli_fetch_assoc($query)){
					if(strcmp($row['email'],$_GET['email'])==0){
						$encontrado=1;
						break;	
					}
				}
				
				if($encontrado){
					echo "	<div>
								<div style='border-style:solid;border-color:black; font-family: Verdana,Geneva,sans-serif; text-align:center;'> <p style='text-align:center;'>OBTENER PREGUNTA</p>
									<form name='datos' ID='datos' action='ClientGetQuestion.php?email=".$_GET['email']."' method='POST'>
										ID: <input type='number' id='id' name='id' size=55><br>
										<input type='submit' id='ver' name='ver' value='Obtener pregunta'>	
									</form>
								</div>
							</div>";

				}else{
					echo"<div style='color:white; background-color:#ff0000'>El usuario no está registrado.</div>";
				}
				mysqli_close($conexion);
				
			}else{
				echo"<div style='color:white; background-color:#ff0000'>El usuario no está registrado.</div>";
			}	
		}
		?>	
		<?php
			
			
			if(isset($_POST['id'])){
				$id = (int) $_POST['id'];
                require_once('../lib/nusoap.php');
                require_once('../lib/class.wsdlcache.php');

				$soapclient = new nusoap_client( 'http://localhost/Proyecto/php/GetQuestionWS.php?wsdl',true);
                $result = $soapclient->call('ObtenerPregunta', array('x'=>$id));

				if($result['autor']==''){
					echo "<h2>No existe ninguna pregunta con el ID ".$id.".</h2>";
				}else{
					echo "<h2> ID: ".$id."</h1>";
					echo "<h2> Autor: ".$result['autor']."</h2>";
					echo "<h2> Enunciado: ".$result['enunciado']."</h2>";
					echo "<h2> Respuesta Correcta: ".$result['correcta']."</h2>";
				}
			}
			
			
		?>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>