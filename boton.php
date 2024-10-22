<?php   
	
	header("Access-Control-Allow-Origin: *");
  	header("Access-Control-Allow-Methods: POST");
  	header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");

 	$comercio = $_POST['comercio'];
 	$direccion = $_POST['direccion'];
 	$telefono = $_POST['telefono'];
 	$geo = $_POST['geo'];
	$redis = new Redis();    
	$redis->pconnect('127.0.0.1',6379);

	$mensaje = array("Tipo" => "Notificación", "Comercio" => "$comercio", "Direccion" => "$direccion", "Telefono" => "$telefono", "Geo" => "$geo");

	$redis->publish('canal', json_encode($mensaje));

	echo "Alarma recibida en C5!";
	 
	exit;  

	$redis->close();
 
?>

	
