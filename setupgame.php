<html>
	<head>
		<title>Scattergories</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="general.js"></script>
	</head>
	<body>
		<div>
			<form name="gamesettings" action="creategame.php" method="POST" enctype="multipart/form-data">
				How Many Players?:
				<input type="number" name="numPlayers" min="1" max="8" name="numPlayers"><br/>
				How Long Per Round?:<br/>
				<select name="roundTime">
					<option value="120"> 2 mins </option>
					<option value="135"> 2 mins 15 secs </option>
					<option value="150"> 2 mins 30 secs </option>
					<option value="165"> 2 mins 45 secs </option>
					<option value="180"> 3 mins </option>
				</select>
				<br/>Which Lists? (Select 3):
				<input type="checkbox" name="L1" onClick="return keepCount()">1</input>
				<input type="checkbox" name="L2" onClick="return keepCount()">2</input>
				<input type="checkbox" name="L3" onClick="return keepCount()">3</input>
				<input type="checkbox" name="L4" onClick="return keepCount()">4</input>
				<input type="checkbox" name="L5" onClick="return keepCount()">5</input>
				<input type="checkbox" name="L6" onClick="return keepCount()">6</input>
				<input type="checkbox" name="L7" onClick="return keepCount()">7</input>
				<input type="checkbox" name="L8" onClick="return keepCount()">8</input>
				<input type="checkbox" name="L9" onClick="return keepCount()">9</input>
				<input type="checkbox" name="L10" onClick="return keepCount()">10</input>
				<br/><input type="submit" value="Begin">
			</form>
		</div>
	</body>
</html>