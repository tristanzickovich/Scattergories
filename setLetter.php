<?php
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$letter = $_POST['letter'];
		$host = $_POST['host'];
		include 'connectdb.php'; //server connection code
		mysqli_query($db,"UPDATE activegames SET letterRolled='$letter' WHERE host='$host'");
		exit();
	}
	else{
		header("location:home.php");
		exit();
	}
?>