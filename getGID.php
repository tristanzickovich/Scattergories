<?php
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		$host = $_GET['host'];
		include 'connectdb.php'; //server connection code
		$query = mysqli_query($db,"SELECT gid FROM activegames WHERE host='$host'");
		$gid = 0;
		while($row = mysqli_fetch_assoc($query)){
			$gid = $row['gid'];
		}
		mysqli_query($db,"UPDATE players SET gid='$gid' WHERE username='$host'");
		echo $gid;
		exit();
	}
?>