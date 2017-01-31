<?php
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		$host = $_GET['host'];
		$round = $_GET['round'];
		$round++;
		include 'connectdb.php'; //server connection code
		if($round < 4){
			mysqli_query($db,"UPDATE activegames SET currentRound='$round' WHERE host='$host'");
			echo 0;
		}
		else{
			mysqli_query($db,"DELETE FROM activegames WHERE host='$host'");
			echo 1;
		}
		exit();
	}
?>