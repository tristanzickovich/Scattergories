<?php
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$letter = $_POST['letter'];
		$gid = $_POST['gid'];
		include 'connectdb.php'; //server connection code
		mysqli_query($db,"UPDATE activegames SET letterRolled='$letter' WHERE gid='$gid'");
		exit();
	}
?>