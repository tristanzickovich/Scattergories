<?php
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$username = $_POST['username'];
		$password = $_POST['password'];
		include 'connectdb.php'; //server connection code
		$query = mysqli_query($db,"SELECT * FROM players WHERE username='$username'");
		if(mysqli_num_rows($query) == 0){
			mysqli_query($db, "INSERT INTO players (username, password) VALUES('$username', '$password')");
			echo 1;
			exit();
		}

		echo 0;
		exit();
	}
	else{
		header("location:home.php");
		exit();
	}
?>