<?php
include "../modelo/index_modelo.php";

	$Datos = new index_modelo;
	$Datos->setEmail($_POST['id']);
	$Datos->setEmail($_POST['email']);
	// $Datos->setPass($_POST['password']);
	$Datos->setName($_POST['name']);
	$Datos->setAp($_POST['ap']);
	$Datos->setAm($_POST['am']);
	$Datos->setTel($_POST['tel']);
	echo json_encode($Datos->register_Modelo());
	
?>
