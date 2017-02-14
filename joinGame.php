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
		<a href="home.php">home</a> <br/>
		Enter username of game host: 
		<input type="text" id="gamehost"></input>
		<input type="button" value="Join Game" onclick="validateJoinGame();">
	</body>
</html>