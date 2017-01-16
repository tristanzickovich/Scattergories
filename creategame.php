<?php
	if($_SERVER['REQUEST_METHOD'] = "POST") //Added an if to keep the page secured
	{
		include 'connectdb.php'; //server connection code
		$numPlayers = $_POST['numPlayers'];
		$roundTime = $_POST['roundTime'];
		mysqli_query($db,"INSERT INTO activegames (roundTime, numPlayers) VALUES ('$roundTime','$numPlayers')");
		$query = mysqli_query($db, "SELECT MAX(gid) AS max FROM activegames");
		$gid = mysqli_fetch_array($query,MYSQLI_ASSOC);
		$gid = $gid['max'];
		header("location: playgame.php?gid=".$gid);
		exit();
	}
	
?>
