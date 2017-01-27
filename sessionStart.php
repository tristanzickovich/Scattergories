<?php
	session_start();
	if(!isset($_SESSION['user'])){ //user not logged in
		header("location:index.php");
		exit();
	}
	else{
		$user = $_SESSION['user'];
	}
?>