<?php
	include 'sessionStart.php';
	$player = $user;
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		$gid = $_GET['gid'];
		include 'connectdb.php';
		
		$query = mysqli_query($db, "SELECT * FROM activegames WHERE gid='$gid'");
		if(mysqli_num_rows($query) < 1){
			header("location:home.php");
			exit();
		}
		$game = mysqli_fetch_array($query,MYSQLI_ASSOC);
		$roundTime = $game['roundTime'];
		$list1 = $game['list1'];
		$list2 = $game['list2'];
		$list3 = $game['list3'];
		$currentRound = $game['currentRound'];
		$letter = $game['letterRolled'];
		$host = $game['host'];
		//pull player data checking for score submission
		$query = mysqli_query($db, "SELECT * FROM gameplayers WHERE player='$player'");
		$gpdata = mysqli_fetch_array($query,MYSQLI_ASSOC);
		$pScoreSent = ($gpdata['roundReady'] > 0 ? true : false);

		//grab list items
		define('myConst', TRUE); //for printlist verification
		include 'printlist.php';
		$curList = 0;
		if($currentRound == 1)
			$curList = $list1;
		else if($currentRound == 2)
			$curList = $list2;
		else if($currentRound == 3)
			$curList = $list3;
		$listitems = retrieveList($curList);
?>
<html>
	<head>
		<title>Scattergories</title>
		<?php
			include 'header.php';
		?>
	</head>
	<body onload="countDown(<?php echo $gid ?>); playersReady(<?php echo $gid; ?>, <?php echo $currentRound; ?>);">
		<div class="content-scope">
		<div class="row">
			<div class="col-md-6">
				<div id="timeLeft" class="rounded"></div>
			</div>
			<div class="col-md-3" style="display: flex; align-items: center;">
				<h4> List #<?php echo $curList; ?></h4>
			</div>
			<div class="col-md-3" style="display: flex; align-items: center;">
				<h4>
				<?php
					print "Letter: " . $letter . "\n";
				?>
				</h4>
			</div>
		</div>
		<br/>
		<div class="row">
		<div id="currentList" class="rounded">
			<table id="listTable" class="table">
			 <thead class="thead-inverse">
				<tr>
					<th></th>
					<th>Item</th>
					<th>Answer</th>
					<th class="hidden rscore">Score</th>
				</tr>
			</thead>
			<?php
				for($i = 0; $i < 12; ++$i){
					Print '<tr>';
					Print '<td>' . ($i + 1) . '. </td>';
					Print '<td>' . $listitems[$i] . '</td>';
					Print '<td id="ans'.$i.'"><input type="text" class="roundAnswers form-control form-control-sm"></td>';
					Print '<td class="hidden rscore"><input type="number" min="0" max="10" value="0" class="rowScore form-control form-control-sm" style="width:52px;"></td>';
					Print '<tr>';
				}
			?>
			</table>
		</div>
		</div>
		<hr>
		<div class="row justify-content-center">
			<div id="roundsScore" class="hidden">
				<?php
				if(!$pScoreSent){
				?>
				<div class="input-group">
					<button class="input-group-addon" onclick="addUpScore()">
						<span class="octicon octicon-sync"></span>
					</button>
					<input type="text" class"form-control form-control-sm" id="curRoundScore">
					<input type="button" class="form-control btn btn-primary" value="Send Score" onclick="updateScore(<?php echo $currentRound; ?>, '<?php echo $player; ?>');">
				</div>
				<?php
				}
				?>
			</div>
		</div>
		<div class="row justify-content-center">
			<div id="scoremsg" class="hidden">
				Please enter an integer, between 0 and 255.
			</div>
			<div id="nextRound" class="hidden">
				<p>Waiting for all players to submit their scores</p>
			</div>
			<?php
			if($pScoreSent){
			?>
				<script>revealElement("nextRound");</script>
			<?php
			}
			} //closing brace for "GET" check
			?>
			</div>
		</div>
	</body>
</html>