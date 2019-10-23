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
    <div>
		<?php
			if(isset($_GET['email'])){
				//comprobar si está en la BBDD
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
								$nombre = $row['nombre'];
								$encontrado=1;
								break;	
							}
						}
						
						if($encontrado){
							echo "	<div style='color:white; background-color:#00cc66'>
									<strong>Sesión cerrada con éxito.</strong> Para volver al inicio <a href='../php/Layout.php' class='alert-link'>pulsa aquí.</a>.
									</div>
							";
						}else{
							echo "<div style='color:white; background-color:#ff0000'>Para cerrar sesión debe haberse iniciado.</div>";
						}
						mysqli_close($conexion);
					}else{
						echo "<div style='color:white; background-color:#ff0000'>Para cerrar sesión debe haberse iniciado.</div>";
					}
			}else{
				echo "<div style='color:white; background-color:#ff0000'>Para cerrar sesión debe haberse iniciado.</div>";
			}
		?>
	</div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>