<?php
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		$gid = $_GET['gid'];
		include 'connectdb.php'; //server connection code
		$query = mysqli_query($db,"SELECT letterRolled, reroll FROM activegames WHERE gid='$gid'");
		$array = mysqli_fetch_array($query,MYSQLI_ASSOC);
		$letterRolled = $array['letterRolled'];
		$reroll = $array['reroll'];
		echo json_encode(array("letter" => $letterRolled, "reroll" => $reroll));
		exit();
	}
	else{
		header("location:home.php");
		exit();
	}
?>