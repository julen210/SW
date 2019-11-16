<?php
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');
	$soapclient = new nusoap_client('http://localhost/Proyecto/php/VerifyPassWS.php?wsdl' ,true);
	print_r($result = $soapclient->call('comprobarpass',array('x'=>$_POST['pass'], 'y'=>$_POST['ticket'])));
?>