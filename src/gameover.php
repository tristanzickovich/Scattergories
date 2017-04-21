<?php
	include 'sessionStart.php';
	$player = $user;
	$gid = $_GET['gid'];
	include 'connectdb.php'; //server connection code
?>
<html>
	<head>
		<title>Scattergories</title>
		<?php
			include 'header.php';
		?>
	</head>
	<body>
		<button onclick='window.location.href="home.php";' class="btn btn-secondary">home</button> <br/>
		<div class="content-scope">
		<h1>Game Over</h1>
		<hr>
		<div class="row">
			<div class="col-sm">
			<table class="table table-hover">
				<thead class="table-inverse">
				<tr>
					<th>player</th>
					<th>round 1</th>
					<th>round 2</th>
					<th>round 3</th>
					<th>total</th>
				</tr>
				</thead>
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
							<td class="table-danger"><strong>'.$scoreTotal.'</strong></td>
						</tr>';
						if($scoreTotal > $winnerScore){
							$winnerScore = $scoreTotal;
							$winner = $curplayer;
						}
						else if($scoreTotal == $winnerScore){
							$winner = $winner . " <br/> " . $curplayer;
						}
					}
				}
			?>
			</table>
			</div>
		</div>
		<hr>
		<h4>Winner(s)!</h4>
		<div class="row col-sm justify-content-center">
			<?php
				echo $winner;
			?>
		</div>
		</div>
	</body>
</html>