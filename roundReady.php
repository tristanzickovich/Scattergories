<?php
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		$gid = $_GET['gid'];
		include 'connectdb.php'; //server connection code
		$query = mysqli_query($db, "SELECT roundReady FROM activegames WHERE gid='$gid'");
		if(mysqli_num_rows($query)>0){
			while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
				if($row['roundReady'] != 1){
					echo 0;
					exit();
				}
			}
		}
		echo 1;
		exit();
	}
?>