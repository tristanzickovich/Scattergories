<?php
	include 'sessionStart.php';
	$player = $user;
	include 'connectdb.php';
	$hasActiveGame = false; $activegid = 0;
	$query = mysqli_query($db, "SELECT * FROM gameplayers WHERE player='$player'");
	if(mysqli_num_rows($query) > 0){
		$hasActiveGame = true;
		$game = mysqli_fetch_array($query,MYSQLI_ASSOC);
		$activegid = $game['gid'];
	}
?>
<html>
	<head>
		<title>Scattergories</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="general.js"></script>
	</head>
	<body>
		<h1 id="mainlogo">Scattergories</h1>
		<?php print $player; ?>
		<a href='logout.php'>logout</a><br/>
		<?php 
		if($hasActiveGame)
			print '<a href="waitLobby.php?gid='.$activegid.'">Return To Game In Progress</a>';
		else{
		?>
			<a href='viewlists.php'>View Lists</a>
			<a href='setupgame.php'>Setup Game</a>
			<a href='joinGame.php'>Join Game</a>
		<?php
		}
		?>
	</body>
</html>