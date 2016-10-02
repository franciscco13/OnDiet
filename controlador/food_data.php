<?php
	include ("../dao/Connection_bd.php");
	$conexion = new Connection_bd; 	
	$conn = $conexion->conection("localhost","root","","dietas");
	$sql = "SELECT idAlimento, name, available FROM alimento";
	$result = $conn->query($sql);
	$array = [];
	while($row = $result->fetch_assoc()){
		$aux = [
			"id" => $row['idAlimento'],
			"tag" => utf8_encode($row['name']),
			"image" => (($row['available'] == 1) ? true : false)
		];
		$array[] = $aux;
	}

	$json = json_encode((array)$array);
	echo $json;
	$conn->close();
?>