<?php
	include 'sessionStart.php';
	$player = $user;
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		include 'connectdb.php'; //server connection code
		$host = $_GET['host'];
		$currentRound = 1;
		
		$query = mysqli_query($db, "SELECT * FROM activegames WHERE host='$host'");
		if(mysqli_num_rows($query)>0){
			$gid = 0;
			while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
				$gid = $row['gid'];
			}
			mysqli_query($db,"INSERT INTO gameplayers (gid, player) VALUES ('$gid','$player')");
			echo $gid;
			exit();
		}
		else{
			echo -1;
			exit();
		}
	}
?>