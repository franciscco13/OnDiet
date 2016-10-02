<?php if(!isset($_SESSION))
	    session_start();

	if(isset($_GET['iddiet'])){
		$id_diet = $_GET['iddiet'];
		$id_nutriologo = $_SESSION['perfil']['id'];

		// Get it on the database
		include ("../dao/Connection_bd.php");
		$conexion = new Connection_bd; 	
		$conn = $conexion->conection("localhost","root","","dietas");

		$sql0 = "SELECT idDietas FROM dietas 
				WHERE idDietas = ".$id_diet." AND Nutriologo_idNutriologo = ".$id_nutriologo;
		$result = $conn -> query($sql0);
		if ($result -> num_rows > 0) { 		

			$sql1 = "DELETE FROM dietasvaloracion
					WHERE Dietas_idDietas = ".$id_diet;
			$sql2 = "DELETE FROM dietas_has_alimento
					WHERE Dietas_idDietas = ".$id_diet;
			$sql3 = "DELETE FROM dietas 
					WHERE idDietas = ".$id_diet;

			$conn -> query($sql1); 
			$conn -> query($sql2); 
			$conn -> query($sql3); 

			// Delete files
			$dir = "../img/diets/"+$id_diet;
			$file = $dir+"/preview.jpg";
 
        	unlink($file); 
        	rmdir($dir);
		}
		else
			echo "Something went wrong";

	}
?>