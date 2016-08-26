<?php if(!isset($_SESSION))
	    session_start();
	// print_r($_SESSION['perfil']); 
	echo json_encode($_SESSION['perfil']);
?>