<?php if(!isset($_SESSION))
	    session_start();

	    if(isset($_GET)){ 
	    	$user_id = $_GET['user_id']; 
	    	$diet["id"] = $_GET['food_id'];
	    	$diet["name"] = $_GET['food_name'];
	    	$diet["description"] = $_GET['food_description']; 
	    	$products = json_decode($_GET['products']);


	    	// Get it on the database
			include ("../dao/Connection_bd.php");
			$conexion = new Connection_bd; 	
			$conn = $conexion->conection("localhost","root","","dietas");

			$sql0 = "SELECT idDietas FROM dietas 
				WHERE idDietas = ".$diet["id"]." AND Nutriologo_idNutriologo = ".$user_id;
			$result = $conn -> query($sql0);

			if ($result -> num_rows > 0) {		 

				// Delete all ingredients
				$sql1 = "DELETE FROM dietas_has_alimento WHERE Dietas_idDietas = ".$diet["id"];		
				$conn -> query($sql1); 

				// Add the new ingredients
				foreach($products as $food){
					$sql_aux = "INSERT INTO dietas_has_alimento (Dietas_idDietas, Alimento_idAlimento) 
								VALUES (".$diet['id'].",".$food->id.")";
					$conn -> query($sql_aux); 
				}

				$sql2 = "UPDATE dietas SET  name = '".$diet["name"]."', 
					descripcion = '".$diet["description"]."' 
					WHERE idDietas = ".$diet["id"];
				$conn -> query($sql2); 

				echo 1;
			}
	    }
?>