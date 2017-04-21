<?php
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$gid = $_POST['gid'];
		$status = 1;
		$reroll = 0;
		include 'connectdb.php'; //server connection code
		mysqli_query($db,"UPDATE activegames SET roundReady='$status', reroll='$reroll' WHERE gid='$gid'");
		exit();
	}
	else{
		header("location:home.php");
		exit();
	}
?>