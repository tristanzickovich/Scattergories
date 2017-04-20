<?php
	include 'sessionStart.php';
	$player = $user;
	$gid = $_GET['gid'];
	include 'connectdb.php'; //server connection code
	$host = "tmp"; $reroll = 0;
	$query = mysqli_query($db, "SELECT host, reroll FROM activegames WHERE gid='$gid'");
	if(mysqli_num_rows($query)>0){
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		$host = $row['host'];
		$reroll = $row['reroll'];
	}
	else{
		header("location:home.php");
		exit();
	}
?>
<html>
	<head>
		<title>Scattergories</title>
		<?php
			include 'header.php';
		?>
	</head>
	<body onload="lobbyPlayers(<?php echo $gid; ?>); enterLobby(<?php echo $gid; ?>); displayDie(<?php echo $gid; ?>);">
		<div class="content-scope">
		<div class="row justify-content-md-center">
			<h1>Lobby</h1>
		</div>
		<hr/>
		<br/>
		<div class="row justify-content-md-center">
		<div class="col-sm-4">
			<div id="die">?</div>
			<br/>
		<?php
		if($host == $player){
			if($reroll < 2){
				if($reroll < 1){
		?>
					<div id="rollButton">
						<button class="btn btn-secondary btn-sm" onclick=" hideElement('rollButton'); rollDie('<?php print $host; ?>');">ROLL DIE</button>
					</div>
					<div id="reroll" class="hidden">
						Reroll?<br/>
						<button class="btn btn-secondary btn-sm" onClick="hideElement('reroll'); rollDie('<?php print $host; ?>');">Yes</button>
						<button class="btn btn-secondary btn-sm" onClick="hideElement('reroll'); revealElement('enterLobby')">No</button>
					</div>
			<?php
				}
				else{
			?>
				<div id="reroll">
					Reroll?<br/>
					<button class="btn btn-secondary btn-sm" onClick="hideElement('reroll'); rollDie('<?php print $host; ?>');">Yes</button>
					<button class="btn btn-secondary btn-sm" onClick="hideElement('reroll'); revealElement('enterLobby')">No</button>
				</div>
		<?php
				}
			}
			else{
		?>
			<div id="enterLobby">
				<button class="btn btn-primary btn-sm" onClick="startRound('<?php print $gid; ?>')">Start Game!</button>
			</div>
		<?php
			}
		?>
		<div id="enterLobby" class="hidden">
			<button class="btn btn-primary btn-sm" onClick="startRound('<?php print $gid; ?>')">Start Game!</button>
		</div>
		<?php
		}
		?>
		</div>
		<div class="col-sm-8">
			<div id="lobbyPlayers"></div>
		</div>
		</div>
		</div>
	</body>
</html>