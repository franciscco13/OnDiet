<?php

class Connection_bd
{
	var $conn;

	function conection($servername,$username,$password,$dbname){
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname); 
		if ($conn->connect_error) 
			die("Connection failed: " . $conn->connect_error);
		return $conn;
	} 

 
  	function login_Query($Email,$Pass){
		$conn = $this->conection("localhost","root","","dietas") or die("no se pudo 1");
		$sql = "SELECT idNutriologo,name,apellidoPat, apellidoMat,email,pass,tel FROM nutriologo";
		$result = $conn->query($sql) or die("no se pudo ");  
		$sql = "SELECT idadmin,email,pass FROM admin";
		$result2= $conn->query($sql) or die("no se pudo ");
		
		if ( $result === FALSE) 
			echo "Cuando no existe la consulta";
		elseif ( $result && $result->num_rows  > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				if($row["email"]==$Email){
					if($row["pass"]==$Pass){
						if(!isset($_SESSION))
	    					session_start();
						$_SESSION['perfil'] = [
							"id" 	 => $row["idNutriologo"],
							"name" => $row["name"],
							"ap"     => $row["apellidoPat"],
							"am"     => $row["apellidoMat"],
							"email"  => $Email,
							"tel"    => $row["tel"]
						]; 
						return 1; 
					}
					else 
						return 0;
				}
				elseif($result2 && $result2->num_rows  > 0){
					// output data of each row
					while($row2 = $result2->fetch_assoc()) {
						if($row2["email"] == $Email){	
							if($row2["pass"] == $Pass)
								return 2;
							else
								return 0;						
						}
					} 
				}
			}
			return -1;
			$conn->close();  
		}
  	}

	function register_Bd($Email,$Pass,$Name,$Ap,$Am,$Tel)
	{
		$conn = $this->conection("localhost","root","","dietas");
		$sql = "SELECT email FROM nutriologo";
		$result = $conn->query($sql); 

		// output data of each row
		while($row = $result->fetch_assoc())
			if($row["email"]==$Email)
				return 0;

		$sql = "INSERT INTO nutriologo (name, apellidoPat, apellidoMat, email, pass, tel) values('$Name','$Ap','$Am','$Email','$Pass',$Tel)";
		$res = $conn->query($sql); 

		if ($res === true){
			session_start();
			$_SESSION['perfil'] = [
				"id" => $conn->insert_id,
				"name" => $Name,
				"ap"     => $Ap,
				"am"    => $Am,
				"email"  => $Email,
				"tel"   => $Tel
			];
		  	return 1;
		}
		else
			// echo "Error: " . $sql . "<br>" . $conn->error;
		 	return -1;
		$conn->close();		 
	}  
}
?>
