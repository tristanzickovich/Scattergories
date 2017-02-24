<?php
	include 'sessionStart.php';
	$player = $user;
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		include 'connectdb.php'; //server connection code
		$roundTime = $_POST['roundTime'];
		$host = $_POST['host'];
		$list1 = $_POST['list1'];
		$list2 = $_POST['list2'];
		$list3 = $_POST['list3'];
		$currentRound = 1;
		$defaultLetter = 'A';
		
		mysqli_query($db,"INSERT INTO activegames (roundTime, list1, list2, list3, currentRound, letterRolled, host) 
							VALUES ('$roundTime','$list1','$list2','$list3','$currentRound', '$defaultLetter', '$host')");
		$query = mysqli_query($db, "SELECT gid FROM activegames WHERE host='$host'");
		$gid = mysqli_fetch_array($query,MYSQLI_ASSOC)['gid'];
		mysqli_query($db,"INSERT INTO gameplayers (gid, player) VALUES ('$gid','$player')");
		mysqli_query($db,"INSERT INTO gamescores (gid, player) VALUES ('$gid','$player')");
		echo $gid;
		exit();
	}
	else{
		header("location:home.php");
		exit();
	}
?>
