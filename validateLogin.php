<?php
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];
		include 'connectdb.php'; //server connection code
		$query = mysqli_query($db,"SELECT username, password FROM players WHERE username='$username' AND password='$password'");
		//username and corresponding password exists
		if(mysqli_num_rows($query) > 0){
			$_SESSION['user'] = $username;
			echo 1;
			exit();
		}
		else{
			echo 0;
			exit();
		}
	}
	else{
		header("location:home.php");
		exit();
	}
?>