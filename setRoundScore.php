<?php
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$score = $_POST['score'];
		$round = $_POST['round'];
		$player = $_POST['player'];
		$status = 1;
		include 'connectdb.php'; //server connection code
		mysqli_query($db,"UPDATE gameplayers SET scoreR".$round."='$score', roundReady='$status' WHERE player='$player'");
		exit();
	}
?>