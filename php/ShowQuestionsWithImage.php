<!DOCTYPE html>
<html>
<head>
	<?php include '../html/Head.html'?>
	<?php include '../php/DbConfig.php'?>
	<style>
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td, th {
			border: 1px solid black;
			padding: 8px;
		}

		th{
			background-color: #0066ff;
			color: white;
			text-align: center;
		}
		td{
			text-align: left;
		}

		tr:nth-child(even) {
			background-color: #dddddd;
		}
	</style>
</head>
<body>
	<?php include '../php/Menus.php' ?>
	<section class="main" id="s1">
    <?php
	//meter todo en un if para comprobar si está log o no
    // Create connection
    $conexion = mysqli_connect($server, $user, $pass, $basededatos);
    // Check connection
    if (!$conexion) {
        die('<div style="color:white; background-color:#ff0000">Error al conectar con la base de datos </div>');
    }

    $sql = "SELECT * FROM preguntas";
    $query = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($query) > 0) {
		echo"<div style='height:500px;overflow-y:scroll;'>
			<table>
				<tr>
					<th>Email</th>
					<th>Pregunta</th>
					<th>Respuesta Correcta</th>
					<th>Imagen</th>
				</tr>
		";
        // output data of each row
        while($row = mysqli_fetch_assoc($query)) {
			//r_correcta, r_in1, r_in2, r_in3, complejidad, tema  
			if($row["img"]==''){
				$rutaimagen = '../images/noimage.png';
			}else{
				$rutaimagen = '../images/'.$row["img"];
			}
			echo" 
				<tr>
					<td>".$row["email"]."</td>
					<td>".$row["enunciado"]."</td>
					<td>".$row["r_correcta"]."</td>
					<td style='text-align:center;'> <img src=".$rutaimagen." height='100'/></td>
				</tr>
			";
        }
        echo"</table></div>";
    } else {
        echo '<div style="color:white; background-color:#ff0000">La base de datos está vacía.</div>';
    }

    mysqli_close($conexion);
    ?>
	</section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
