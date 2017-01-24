<?php
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$gid = $_POST['gid'];
		include 'connectdb.php'; //server connection code
		
		$query = mysqli_query($db,"SELECT roundStartTime, roundTime FROM activegames WHERE gid='$gid'");
		$startTime = 0; $roundTime = 0;

		while($row = mysqli_fetch_assoc($query)){
			$startTime = $row['roundStartTime'];
			$roundTime = $row['roundTime'];
		}
		$curTime = date('Y-m-d H:i:s');
		echo $roundTime-(strtotime($curTime) - strtotime($startTime));
		exit();
	}
?>
