<?php
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');
	
	$ns="http://localhost/nusoap-0.9.5/samples";
	$server = new soap_server;
	$server->configureWSDL('comprobarpass',$ns);
	$server->wsdl->schemaTargetNamespace=$ns;
	
	$server->register('comprobarpass',
	array('x'=>'xsd:string', 'y' =>'xsd:int'),
	array('z'=>'xsd:string'),
	$ns);

	function comprobarpass ($x, $y){
		if($y==1010){
			if(strpos(file_get_contents('../txt/toppasswords.txt'),$x) !== false) {
				return "INVALIDA";
			}
			return "VALIDA";
		}else{
			return "SIN SERVICIO";
		}
	}
	if(!isset($HTTP_RAW_POST_DATA)){
		$HTTP_RAW_POST_DATA =file_get_contents('php://input');
		$server->service($HTTP_RAW_POST_DATA);
	}
?> 