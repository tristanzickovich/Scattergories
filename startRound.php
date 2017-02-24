<?php
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$gid = $_POST['gid'];
		$status = 1;
		include 'connectdb.php'; //server connection code
		mysqli_query($db,"UPDATE activegames SET roundReady='$status' WHERE gid='$gid'");
		exit();
	}
	else{
		header("location:home.php");
		exit();
	}
?>