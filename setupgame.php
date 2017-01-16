<html>
	<head>
		<title>Scattergories</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="general.js"></script>
	</head>
	<body>
		<div>
			<form action="creategame.php" method="POST" enctype="multipart/form-data">
				How Many Players?:
				<input type="number" name="numPlayers" min="1" max="8" name="numPlayers"><br/>
				How Long Per Round?:<br/>
				<select name="roundTime" name="roundTime">
					<option value="120"> 2 mins </option>
					<option value="135"> 2 mins 15 secs </option>
					<option value="150"> 2 mins 30 secs </option>
					<option value="165"> 2 mins 45 secs </option>
					<option value="180"> 3 mins </option>
				</select>
				<br/><input type="submit" value="Begin">
			</form>
		</div>
	</body>
</html>