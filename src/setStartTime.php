<?php
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$gid = $_POST['gid'];
		include 'connectdb.php'; //server connection code
		$startTime = date('Y-m-d H:i:s');
		mysqli_query($db,"UPDATE activegames SET roundStartTime='$startTime' WHERE gid='$gid'");
		exit();
	}
	else{
		header("location:home.php");
		exit();
	}
?>
