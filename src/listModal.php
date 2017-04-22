<?php
	include 'sessionStart.php';
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		$listnum = $_GET['listnum'];
		define('myConst', TRUE);
		include 'printlist.php';
		$listitems = retrieveList($listnum);
		echo json_encode($listitems);
	}
	else{
		header("location:home.php");
		exit();
	}
?>