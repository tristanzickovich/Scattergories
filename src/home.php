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
		<div class="content-scope">
		<ul class="nav justify-content-center">
		<li class="navbar-brand">Scattergories</li>
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
		<li><a class="nav-link" href='logout.php'>logout</a></li>
		</ul>
		<hr>
		<div class="row justify-content-md-center">
			<h1>Scattergories Rules</h1>
		</div>
		<hr>
		<div style="text-align: left;">
		<h3>Getting Started</h3>
		<div class="row" id="gettingStarted">
			<ul>
				<li>Choose a player to be the game host</li>
				<li>Host clicks <em>Setup Game</em> from the home screen</li>
				<li>Host chooses time and list preferences, and clicks <em>Create Game</em></li>
				<li>Non-hosts now click <em>Join Game</em> from the home screen</li>
				<li>Non-hosts now type in the username of the host and click <em>Join Game</em></li>
				<li>All players will be put into a lobby and the game can now commence</li>
			</ul>
		</div>
		<hr>
		<h3>Game Rules
			<button type="button" id="grB" class="btn btn-secondary" data-toggle="collapse" data-target="#gameRules">
		      <span class="octicon octicon-chevron-down"></span>
		    </button>
		</h3>
		<div class="row collapse" id="gameRules">
			<ul>
				<li>Host rolls the die at the beggining of each round to choose the letter for the round</li>
				<li>There is 1 re-roll allowed per round</li>
				<li>Host selects <em>Begin Round</em> when all players are ready</li>
				<li>Each round lasts between 2-3 minutes (depending on chosen preference)</li>
				<li>Players fill in text boxes with answers before the timer runs out</li>
				<li>Answers must relate to the category of what is listed in the <em>Item</em> entry for that row</li>
				<li>Answers must begin with the letter rolled for that round (displayed at the top of the page)</li>
				<li>At the end of each round, players score thier own round and enter/submit their score. 
					(See <em>Scoring Rules</em> section for scoring instructions)</li>
			</ul>
		</div>
		<hr>
		<h3>Scoring Rules
			<button type="button" id="srB" class="btn btn-secondary" data-toggle="collapse" data-target="#scoringRules">
		      <span class="octicon octicon-chevron-down"></span>
		    </button>
		</h3>
		<div class="row collapse" id="scoringRules">
			<ul>
				<li>At the end of each round, each player takes turns saying thier answer out loud to the group</li>
				<li>If more than one player submitted the same answer, no points are awarded for that entry</li>
				<li>The group collectively decides if each answer is appropriate</li>
				<li>Approved answers are awarded points</li>
				<li>For each word in the answer beginning with the letter for the round, 1 point is awarded.
					For Example. If the round letter is 'J', "Jogging" is awared 1 point, "Jumping Jacks" is awarded 2 points, etc.</li>
				<li>Keep track of your scores during scoring and submit your total score at the end of each round</li>
			</ul>
		</div>
		</div>
		</div>
	</body>
<footer>
	<script>
	$(document).ready(function(){
	  $("#gameRules").on("hide.bs.collapse", function(){
	    $("#grB").html('<span class="octicon octicon-chevron-down"></span>');
	  });
	  $("#gameRules").on("show.bs.collapse", function(){
	    $("#grB").html('<span class="octicon octicon-chevron-up"></span>');
	  });
	  $("#scoringRules").on("hide.bs.collapse", function(){
	    $("#srB").html('<span class="octicon octicon-chevron-down"></span>');
	  });
	  $("#scoringRules").on("show.bs.collapse", function(){
	    $("#srB").html('<span class="octicon octicon-chevron-up"></span>');
	  });
	});
</script>
</footer>
</html>