<?php
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');
	$ns="http://localhost/nusoap-0.9.5/samples";
	$servidor = new soap_server;
	$servidor->configureWSDL('ObtenerPregunta',$ns);
	$servidor->wsdl->schemaTargetNamespace=$ns;
	
	$servidor->wsdl->addComplexType(
		'pregunta',
		'complexType',
		'struct',
		'all',
		'',
		array(
			'autor' => array('name'=>'autor','type'=>'xsd:string'),
			'enunciado' => array('name'=>'enunciado','type'=>'xsd:string'),
			'correcta' => array('name'=>'correcta','type'=>'xsd:string'),
		)
	);
	
	$servidor->register('ObtenerPregunta',
	array('x'=>'xsd:int'),
	array('pregunta'=>'tns:pregunta'),
	$ns);

	function ObtenerPregunta ($x){
		include 'DbConfig.php';
		$conexion = mysqli_connect($server, $user, $pass, $basededatos);
		if (!$conexion) {
			die('<div style="color:white; background-color:#ff0000">Error al conectar con la base de datos.</div>');
		}else{
			$sql = "SELECT email,enunciado,r_correcta FROM preguntas WHERE ID =".$x;
			$query = mysqli_query($conexion, $sql);
			if($query){
				$row = mysqli_fetch_array($query);
				$pregunta = array('autor'=> $row['email'],'enunciado'=> $row['enunciado'], 'correcta'=> $row['r_correcta']);
				return $pregunta;
			}
			return $pregunta;
		}
	}
	if(!isset($HTTP_RAW_POST_DATA)){
		$HTTP_RAW_POST_DATA =file_get_contents('php://input');
		$servidor->service($HTTP_RAW_POST_DATA);
	}
?> 