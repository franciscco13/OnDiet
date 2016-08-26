<?php if(!isset($_SESSION))
	    session_start();
//echo json_encode($_POST['email']);

include "../modelo/login_modelo.php";

	$Datos = new login_modelo;
	$Datos->setEmail($_POST['email']);
	$Datos->setPass($_POST['password']);

	$answer = json_encode($Datos->login_Modelo()); 
	echo $answer;
?>