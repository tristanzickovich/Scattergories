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
		<?php
			include 'header.php';
		?>
	</head>
	<body>
		<ul class="nav justify-content-center">
		<li class="navbar-brand">Scattergories</div>
		<?php 
		if($hasActiveGame)
			print '<li><a class="nav-link" href="waitLobby.php?gid='.$activegid.'">Return To Game In Progress</a></li>';
		else{
		?>
			<li><a class="nav-link" href='viewlists.php'>View Lists</a></li>
			<li><a class="nav-link" href='setupgame.php'>Setup Game</a></li>
			<li><a class="nav-link" href='joinGame.php'>Join Game</a></li>
		<?php
		}
		?>
		<li class="navbar"><?php print $player; ?></li>
		<li><a class="nav-link" href='logout.php'>logout</a><br/></li>
		</ul>
	</body>
</html>