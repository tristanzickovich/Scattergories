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
		<h1 id="mainlogo">Scattergories</h1>
		<?php print $user; ?>
		<a href='logout.php'>logout</a><br/>
	   	<a href='viewlists.php'>View Lists</a>
		<a href='setupgame.php'>Setup Game</a>
	</body>
</html>