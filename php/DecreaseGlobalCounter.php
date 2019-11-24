<?php
	if(!isset($_SESSION)){
		session_start();
	}
	if(isset($_SESSION['email'])){

		try{
			libxml_use_internal_errors(TRUE);
			$xml = simplexml_load_file('../xml/Counter.xml');
			$mail = $_SESSION['email'];
			$index = 0;
			foreach ($xml->children() as $users){
				if($users == $mail){
					unset($xml->user[$index]);
					break;
				}
				$index++;
			}
			$xml->asXML('../xml/Counter.xml');
			session_destroy();
			header('Location: Layout.php');
		}catch(Exception $e){
			echo "<div style='color:white; background-color:#ff0000'>Error al cerrar sesión, inténtelo otra vez.</div>";
		}
	}
?>

