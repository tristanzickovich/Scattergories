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

?>
<html>
	<head>
		<title>Scattergories</title>
		<link rel="stylesheet" type="text/css" href="./style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="general.js"></script>
	</head>
	<body onload="countDown(<?php echo $gid ?>); playersReady(<?php echo $gid; ?>, <?php echo $currentRound; ?>);">
		<div id="timeLeft"></div>
		<?php
			define('myConst', TRUE); //for printlist verification
			print "Letter: " . $letter . "\n";
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
		
		<div id="currentList">
			<table id="listTable">
				<tr>
					<th colspan="3"> List <?php echo $curList; ?> </th>
				</tr>
				<tr>
					<th colspan="2">Item</th>
					<th>Answer</th>
				</tr>
			<?php
				for($i = 0; $i < 12; ++$i){
					Print '<tr>';
					Print '<td>' . ($i + 1) . '. </td>';
					Print '<td>' . $listitems[$i] . '</td>';
					Print '<td id="ans'.$i.'"><input type="text" class="roundAnswers"></td>';
					Print '<tr>';
				}
			?>
			</table>
		</div>
		<div id="roundsScore" class="hidden">
			<?php
			if(!$pScoreSent){
			?>
			<input type="text" id="curRoundScore">
			<input type="button" value="Send Score" onclick="updateScore(<?php echo $currentRound; ?>, '<?php echo $player; ?>');">
			<?php
			}
			?>
		</div>
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
	</body>
</html>