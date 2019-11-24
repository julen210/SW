<?php
	try{
		libxml_use_internal_errors(TRUE);
		$xml = simplexml_load_file('../xml/Counter.xml');
		$encontrado = false;
		if(!isset($_SESSION)){
			session_start();
		}
		$mail = $_SESSION['email'];
		foreach ($xml->children() as $users){
			if($users == $mail){
				$encontrado = true;
				break;
			}
		}
		if(!$encontrado){
			$xml->addChild('user',$_SESSION['email']);
		}
		$xml->asXML('../xml/Counter.xml');
	}catch(Exception $e){
		echo "<div style='color:white; background-color:#ff0000'>Error al iniciar sesión, inténtelo otra vez.</div>";
	}
?>