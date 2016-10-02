<?php if(!isset($_SESSION))
	    session_start();

	session_destroy();
	$_SESSION = [];
	print_r($_SESSION);
	header("location: /");
?>