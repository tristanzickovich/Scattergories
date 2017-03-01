<?php
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		function changetime($changes){
			if($changes > 10)
				return .1;
			else if($changes > 4)
				return .2;
			else if($changes > 1)
				return .3;
			else
				return .4;
		}

		$changes = $_POST['changes'];
		$host = $_POST['host'];
		$letter = '';
		include 'connectdb.php'; //server connection code
		//update num of rolls in db
		$query = mysqli_query($db, "SELECT reroll FROM activegames WHERE host='$host'");
		$reroll = mysqli_fetch_array($query,MYSQLI_ASSOC)['reroll'];
		++$reroll;
		mysqli_query($db,"UPDATE activegames SET reroll='$reroll' WHERE host='$host'");
		//simulate die roll, update db
		for($i = $changes; $i >= 0 ; --$i){
			$letter = chr(65 + mt_rand(0, 25));
			mysqli_query($db,"UPDATE activegames SET letterRolled='$letter' WHERE host='$host'");
			usleep(changetime($i) * 1000000);
		}
		echo $reroll;
		exit();
	}
	else{
		header("location:home.php");
		exit();
	}
?>