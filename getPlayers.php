<?php
	include 'sessionStart.php';
	$player = $user;
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		$gid = $_GET['gid'];
		include 'connectdb.php'; //server connection code
		$playerArr = array();
		$query = mysqli_query($db, "SELECT player FROM gameplayers WHERE gid='$gid'");
		if(mysqli_num_rows($query)>0){
			while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
				array_push($playerArr, $row['player']);
			}
		}
		echo json_encode($playerArr);
	}
?>