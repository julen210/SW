<div id='page-wrap'>
<header class='main' id='h1'>
		<?php include '../php/DbConfig.php' ?>
		<?php 
			if(!isset($_GET['email'])){
				echo "<span class='right'><a href='/Proyecto/php/SignUp.php'>Registro</a></span> ";
				echo "<span class='right'><a href='/Proyecto/php/LogIn.php'>Login</a></span>";
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
					$rutaimagen='';
					while($row = mysqli_fetch_assoc($query)){
						if(strcmp($row['email'],$_GET['email'])==0){
							$encontrado=1;
							$nombre = $row['nombre'];
							if($row["imagen"]==''){
								$rutaimagen = '../images/noimage.png';
							}else{
								$rutaimagen = '../images/'.$row["imagen"];
							}
							break;	
						}
					}
					
					if($encontrado){
						include '../php/IncreaseGlobalCounter.php';
						echo "	<span class='right' id='logout'><a href='DecreaseGlobalCounter.php?email=".$_GET['email']."'>Logout</a></span>";
						echo"	<span class='right'>Bienvenido, ".$nombre."<img src=".$rutaimagen." height='100'/></span>";
					}else{
						echo "<span class='right'><a href='/Proyecto/php/SignUp.php'>Registro</a></span> ";
						echo "<span class='right'><a href='/Proyecto/php/LogIn.php'>Login</a></span>";
					}
					mysqli_close($conexion);
					
				}else{
					echo "<span class='right'><a href='/Proyecto/php/SignUp.php'>Registro</a></span> ";
					echo "<span class='right'><a href='/Proyecto/php/LogIn.php'>Login</a></span>";
				}
			}
		?>
</header>
<nav class='main' id='n1' role='navigation'>
			<?php 
				if(!isset($_GET['email'])){
					echo"<span><a href='Layout.php'>Inicio</a></span>";
					echo"<span><a href='Credits.php'>Créditos</a></span>";
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
							echo"<span><a href='Layout.php?email=".$_GET['email']."'>Inicio</a></span>";
							echo"<span><a href='HandlingQuizesAjax.php?email=".$_GET['email']."'>Gestionar preguntas</a></span>";
							echo"<span><a href='ClientGetQuestion.php?email=".$_GET['email']."'>Obtener Preguntas</a></span>";
							echo"<span><a href='Credits.php?email=".$_GET['email']."'>Créditos</a></span>";
						}else{
							echo"<span><a href='Layout.php'>Inicio</a></span>";
							echo"<span><a href='Credits.php'>Créditos</a></span>";
						}
						mysqli_close($conexion);
						
					}
				}
			?>
</nav>

