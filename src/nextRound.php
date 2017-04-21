<?php
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		$gid = $_GET['gid'];
		$round = $_GET['round'];
		$round++;
		$status = 0;
		include 'connectdb.php'; //server connection code
		if($round < 4){
			mysqli_query($db,"UPDATE activegames SET currentRound='$round', roundReady='$status' WHERE gid='$gid'");
			mysqli_query($db,"UPDATE gameplayers SET roundReady='$status' WHERE gid='$gid'");
			echo 0;
		}
		else{
			mysqli_query($db,"DELETE FROM activegames WHERE gid='$gid'");
			mysqli_query($db,"DELETE FROM gameplayers WHERE gid='$gid'");
			echo 1;
		}
		exit();
	}
	else{
		header("location:home.php");
		exit();
	}
?>