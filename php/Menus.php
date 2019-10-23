<div id='page-wrap'>
<header class='main' id='h1'>
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
							if($row["img"]==''){
								$rutaimagen = '../images/noimage.png';
							}else{
								$rutaimagen = '../images/'.$row["img"];
							}
							break;	
						}
					}
					
					if($encontrado){
						echo "	<span class='right' id='logout'><a href='/Proyecto/php/LogOut.php?email=".$_GET['email']."'>Logout</a></span>";
						echo"	<span class='right'>Bienvenido, ".$_GET['email']."<img src=".$rutaimagen." height='100'/></span>";
					}else{
						echo "<span class='right'><a href='/Proyecto/php/SignUp.php'>Registro</a></span> ";
						echo "<span class='right'><a href='/Proyecto/php/LogIn.php'>Login</a></span>";
					}
					$sql->close();
					mysqli_close($mysqli);
					
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
					echo"<span><a href='Credits.php'>Creditos</a></span>";
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
							echo"<span><a href='Layout.php'>Inicio</a></span>";
							echo"<span><a href='QuestionFormWithImage.php'>Insertar Pregunta</a></span>";
							echo"<span><a href='ShowQuestionsWithImage.php'>Ver Preguntas</a></span>";
							echo"<span><a href='Credits.php'>Creditos</a></span>";
						}else{
							echo"<span><a href='Layout.php'>Inicio</a></span>";
							echo"<span><a href='Credits.php'>Creditos</a></span>";
						}
						$sql->close();
						mysqli_close($mysqli);
						
					}
				}
			?>
</nav>

