<?php if(!isset($_SESSION))
	    session_start();

	if(isset($_POST) && isset($_FILES)){
		print_r($_POST); 
		print_r($_FILES);
 
		$name = $_POST['name'];
		$descrip = $_POST['description'];
		$user_id = $_SESSION['perfil']['id'];

		// Get it on the database
		include ("../dao/Connection_bd.php");
		$conexion = new Connection_bd; 	
		$conn = $conexion->conection("localhost","root","","dietas");
		$sql = "INSERT INTO dietas (name, descripcion, Nutriologo_idNutriologo) VALUES ('".$name."', '".$descrip."', ".$user_id.")"; 

		if($conn -> query ($sql) === true){
			$diet_id = $conn -> insert_id;
 			$food = json_decode($_POST['food'], true);
 			print_r($food);
			foreach($food as $key => $value){ 				
				$food_id = $food[$key]["id"];
				$food_name = $food[$key]["name"];

				// register the new aliment
				if($food_id == null){
					$sql2 = "INSERT INTO alimento (name, available) VALUES ('".$food_name."', 0)"; 
					if($conn -> query ($sql2) === true)
						$food_id = $conn -> insert_id;
				}

				$sql3 = "INSERT INTO dietas_has_alimento (Dietas_idDietas, Alimento_idAlimento) VALUES (".$diet_id.", ".$food_id.")"; 
				if($conn -> query ($sql3) === true)
					echo "Registro creado";
			}			
		} 

		$info = pathinfo($_FILES['dietImg']['name']);
		$newname = "preview.jpg"; 
		$newpath = '../img/diets/'.$diet_id;

		if (!file_exists($newpath))
    		mkdir($newpath, 0777, true);

		$target = $newpath.'/'.$newname;
		move_uploaded_file( $_FILES['dietImg']['tmp_name'], $target);
		$conn->close();
	}

?>