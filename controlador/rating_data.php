<?php if(!isset($_SESSION))
	    session_start(); 
	if(!array_key_exists('rates', $_SESSION))
		$_SESSION['rates'] = [];
	echo json_encode($_SESSION['rates']);
?>