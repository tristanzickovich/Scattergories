<?php
	include 'sessionStart.php';
	$player = $user;
	$gid = $_GET['gid'];
	include 'connectdb.php'; //server connection code
	$host = "tmp";
	$query = mysqli_query($db, "SELECT host FROM activegames WHERE gid='$gid'");
	if(mysqli_num_rows($query)>0){
		while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
			$host = $row['host'];
		}
	}
	else{
		header("location:home.php");
		exit();
	}
?>
<html>
	<head>
		<title>Scattergories</title>
		<link rel="stylesheet" type="text/css" href="./style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="general.js"></script>
	</head>
	<body onload="lobbyPlayers(<?php echo $gid; ?>); enterLobby(<?php echo $gid; ?>)">
		<h1>Lobby</h1>
		<div id="lobbyPlayers"></div>
		<?php
		if($host == $player){
		?>
		<div id="die">?</div>
		<div id="rollButton">
			<button onclick=" hideElement('rollButton'); rollDie(15, 0, '<?php print $host; ?>');">ROLL DIE</button>
		</div>
		<div id="reroll" class="hidden">
			Reroll?<br/>
			<button onClick="hideElement('reroll'); rollDie(15, 1, '<?php print $host; ?>');">Yes</button>
			<button onClick="hideElement('reroll'); revealElement('enterLobby')">No</button>
		</div>
		<div id="enterLobby" class="hidden">
			<button onClick="startRound('<?php print $gid; ?>')">Start Game!</button>
		</div>
		<?php
		}
		?>
	</body>
</html>