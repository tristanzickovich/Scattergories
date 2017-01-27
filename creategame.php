<?php
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		include 'connectdb.php'; //server connection code
		$numPlayers = $_POST['numPlayers'];
		$roundTime = $_POST['roundTime'];
		$host = $_POST['host'];
		$list1 = $_POST['list1'];
		$list2 = $_POST['list2'];
		$list3 = $_POST['list3'];
		$currentRound = 1;
		$defaultLetter = 'A';
		
		mysqli_query($db,"INSERT INTO activegames (roundTime, numPlayers, list1, list2, list3, currentRound, letterRolled, host) 
							VALUES ('$roundTime','$numPlayers','$list1','$list2','$list3','$currentRound', '$defaultLetter', '$host')");
		$query = mysqli_query($db, "SELECT MAX(gid) AS max FROM activegames");
		$gid = mysqli_fetch_array($query,MYSQLI_ASSOC);
		$gid = $gid['max'];
		echo $gid;
		exit();
	}
	
?>
