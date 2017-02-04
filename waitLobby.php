<?php
	include 'sessionStart.php';
	$player = $user;
?>
<html>
	<head>
		<title>Scattergories</title>
		<link rel="stylesheet" type="text/css" href="./style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="general.js"></script>
	</head>
	<body>
		<h1>Lobby</h1>
		<div id="die">?</div>
		<div id="rollButton">
			<button onclick=" hideElement('rollButton'); rollDie(15, 0, '<?php print $player; ?>');">ROLL DIE</button>
		</div>
		<div id="reroll" class="hidden">
			Reroll?<br/>
			<button onClick="hideElement('reroll'); rollDie(15, 1, '<?php print $player; ?>');">Yes</button>
			<button onClick="hideElement('reroll'); revealElement('enterLobby')">No</button>
		</div>
		<div id="enterLobby" class="hidden">
			<button onClick="enterLobby('<?php print $player; ?>')">Start Game!</button>
		</div>
	</body>
</html>