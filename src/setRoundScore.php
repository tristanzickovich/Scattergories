<?php
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$score = $_POST['score'];
		$round = $_POST['round'];
		$player = $_POST['player'];
		$status = 1;
		include 'connectdb.php'; //server connection code
		mysqli_query($db,"UPDATE gameplayers SET roundReady='$status' WHERE player='$player'");
		mysqli_query($db,"UPDATE gamescores SET s".$round."='$score' WHERE player='$player'");
		exit();
	}
	else{
		header("location:home.php");
		exit();
	}
?>