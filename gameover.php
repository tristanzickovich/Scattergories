<?php
	include 'sessionStart.php';
	$player = $user;
	$gid = $_GET['gid'];
	include 'connectdb.php'; //server connection code
?>
<html>
	<head>
		<title>Scattergories</title>
		<link rel="stylesheet" type="text/css" href="./style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="general.js"></script>
	</head>
	<body>
		<a href="home.php">home</a> <br/>
		<h1>Game Over</h1>
		<div>
			<table>
				<tr>
					<th>player</th>
					<th>round 1</th>
					<th>round 2</th>
					<th>round 3</th>
					<th>total</th>
				</tr>
			<?php
				$curplayer="tmp"; $score1=0; $score2=0; $score3=0; $scoreTotal=0; 
				$winner=""; $winnerScore=0;
				$query = mysqli_query($db, "SELECT * FROM gamescores WHERE gid='$gid'");
				if(mysqli_num_rows($query)>0){
					while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
						$curplayer = $row['player'];
						$score1 = $row['s1'];
						$score2 = $row['s2'];
						$score3 = $row['s3'];
						$scoreTotal = ($score1 + $score2 + $score3);
						print'
						<tr>
							<td>'.$curplayer.'</td>
							<td>'.$score1.'</td>
							<td>'.$score2.'</td>
							<td>'.$score3.'</td>
							<td>'.$scoreTotal.'</td>
						</tr>';
						if($scoreTotal > $winnerScore){
							$winnerScore = $scoreTotal;
							$winner = $curplayer;
						}
						else if($scoreTotal == $winnerScore){
							$winner = $winner . " and " . $curplayer;
						}
					}
				}
			?>
			</table>
			<?php
				echo "Winner(s)! : " . $winner;
			?>
		</div>
	</body>
</html>