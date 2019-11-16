<?php
	if(isset($_GET['email'])){
		
		try{
			libxml_use_internal_errors(TRUE);
			$xml = simplexml_load_file('../xml/Counter.xml');
			$mail = $_GET['email'];
			$index = 0;
			foreach ($xml->children() as $users){
				if($users == $mail){
					unset($xml->user[$index]);
					break;
				}
				$index++;
			}
			$xml->asXML('../xml/Counter.xml');
			echo "<script>alert('¡Hasta luego!');window.location.href='Layout.php';</script>";
		}catch(Exception $e){
			echo "<div style='color:white; background-color:#ff0000'>Error al cerrar sesión, inténtelo otra vez.</div>";
		}
	}
?>

