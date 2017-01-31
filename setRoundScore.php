<?php
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$score = $_POST['score'];
		$round = $_POST['round'];
		$player = $_POST['player'];
		include 'connectdb.php'; //server connection code
		mysqli_query($db,"UPDATE players SET scoreR".$round."='$score' WHERE username='$player'");
		exit();
	}
?>