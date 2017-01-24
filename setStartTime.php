<?php
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		include 'connectdb.php'; //server connection code
		$startTime = date('Y-m-d H:i:s');
		mysqli_query($db,"UPDATE activegames SET roundStartTime='$startTime'");
		exit();
	}
?>
