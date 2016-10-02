<?php
	include ("../dao/Connection_bd.php");	
	$conexion = new Connection_bd; 	
	$conn = $conexion->conection("localhost","root","","dietas");

	// Get main diet info
	if(!isset($_GET['profile']))
		$sql = "SELECT d.idDietas, d.name as DIETA, d.descripcion, n.idNutriologo, n.name as NUTRIOLOGO, n.apellidoPat, n.apellidoMat 
				FROM dietas as d, nutriologo as n
				WHERE d.Nutriologo_idNutriologo = n.idNutriologo";
	else
		$sql = "SELECT d.idDietas, d.name as DIETA, d.descripcion, n.idNutriologo, n.name as NUTRIOLOGO, n.apellidoPat, n.apellidoMat 
			FROM dietas as d, nutriologo as n
			WHERE d.Nutriologo_idNutriologo = n.idNutriologo
			and n.idNutriologo = ".$_GET['profile'];

	$result = $conn->query($sql);
	if (!$result) {
   		printf("Errormessage: %s\n", $conn->error);
	}

	$array = [];

	if ($result->num_rows > 0) {		

		while($row = $result->fetch_assoc()){

			// Get evaluation
			$sqlrating = "SELECT v.valoracion
					FROM dietas d, dietasvaloracion v
					WHERE v.Dietas_idDietas = d.idDietas
					and d.idDietas = ".$row['idDietas'];
			$resultrating = $conn->query($sqlrating);
			$rating_sum = 0;
			$total_rating = 0;
			$cont = 0;
			if ($resultrating->num_rows > 0) {
				while($rowrat = $resultrating->fetch_assoc()){
					$cont++;
					$rating_sum += ($rowrat['valoracion']*1);
				}
				$total_rating = $rating_sum / $cont;
			} 

			// Get each food data of the diet
			$sqlfood = "SELECT a.idAlimento,  a.name, a.available
					FROM dietas_has_alimento x, alimento a
					WHERE x.Alimento_idAlimento = a.idAlimento
					and x.Dietas_idDietas = ".$row['idDietas'];
			$resultfood = $conn->query($sqlfood);
			$food = [];
			while($row2 = $resultfood->fetch_assoc()){
				$aux = [
					"id" => $row2['idAlimento'],
					"name" => utf8_encode($row2['name']),
					"available" => $row2['available']
				];
				$food [] = $aux;
			}


			$aux = [
				"id" => $row['idDietas'],
				"name" => utf8_encode($row['DIETA']),
				"descripcion" => utf8_encode($row['descripcion']),
				"rating" => $total_rating,
				"nutriologo" => [
					"id" => $row["idNutriologo"],
					"name" => utf8_encode($row["NUTRIOLOGO"]),
					"apPat" => utf8_encode($row["apellidoPat"]),
					"apMat" => utf8_encode($row["apellidoMat"])
				],
				"alimento" => $food
			];

			$array[] = $aux;
		}
	}
 
	$json = json_encode((array)$array);
	echo $json;
	$conn->close();
?>