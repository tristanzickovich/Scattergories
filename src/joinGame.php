<?php
	include 'sessionStart.php';
?>
<html>
	<head>
		<title>Scattergories</title>
		<?php
			include 'header.php';
		?>
	</head>
	<body>
		<button onclick='window.location.href="home.php";' class="btn btn-secondary">home</button><br/> 
		<div class="content-scope">
		<h2>Join Game</h2>
		<hr>
		Enter username of game host:
		<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
		<div class="input-group">
		    <input type="text" class="form-control" id="gamehost">
		    <span class="input-group-btn">
		      <button class="btn btn-secondary" type="button" onclick="validateJoinGame();">Join Game</button>
		    </span>
	    </div>
	    </div>
		</div>
		</div>
	</body>
</html>