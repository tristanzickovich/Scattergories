<?php
	include 'sessionStart.php';
?>
<html>
	<head>
		<title>Scattergories</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="general.js"></script>
	</head>
	<body>
		<div id="setupOptions">
			<form name="gamesettings">
				How Many Players?:
				<input type="number" min="1" max="8" id="numPlayers" value="1"><br/>
				How Long Per Round?:<br/>
				<select id="roundTime">
					<option value="120"> 2 mins </option>
					<option value="135"> 2 mins 15 secs </option>
					<option value="150"> 2 mins 30 secs </option>
					<option value="165"> 2 mins 45 secs </option>
					<option value="180"> 3 mins </option>
				</select>
				<br/>Which Lists? (Select 3):
				<table id="listCheckbox">
					<tr>
						<td><input type="checkbox" id="L1">1</input></td>
						<td><input type="checkbox" id="L2">2</input></td>
						<td><input type="checkbox" id="L3">3</input></td>
						<td><input type="checkbox" id="L4">4</input></td>
						<td><input type="checkbox" id="L5">5</input></td>
						<td><input type="checkbox" id="L6">6</input></td>
					</tr>
					<tr>
						<td><input type="checkbox" id="L7">7</input></td>
						<td><input type="checkbox" id="L8">8</input></td>
						<td><input type="checkbox" id="L9">9</input></td>
						<td><input type="checkbox" id="L10">10</input></td>
						<td><input type="checkbox" id="L11">11</input></td>
						<td><input type="checkbox" id="L12">12</input></td>
					</tr>
					<tr>
						<td><input type="checkbox" id="L13">13</input></td>
						<td><input type="checkbox" id="L14">14</input></td>
						<td><input type="checkbox" id="L15">15</input></td>
						<td><input type="checkbox" id="L16">16</input></td>
						<td><input type="checkbox" id="L17">17</input></td>
						<td><input type="checkbox" id="L18">18</input></td>
					</tr>
				</table>
				<input type="button" value="Submit" onclick="validateSetup('<?php print $user; ?>');">
			</form>
		</div>
		<div id="die" class="hidden">?</div>
		<div id="rollButton" class="hidden">
			<button onclick=" hideElement('rollButton'); rollDie(15, 0, '<?php print $user; ?>')">ROLL DIE</button>
		</div>
		<div id="reroll" class="hidden">
			Reroll?<br/>
			<button onClick="hideElement('reroll'); rollDie(15, 1, '<?php print $user; ?>')">Yes</button>
			<button onClick="hideElement('reroll'); revealElement('ready')">No</button>
		</div>
		<div id="ready" class="hidden">
			<button onClick="hideElement('ready')">Begin!</button>
		</div>
	</body>
</html>