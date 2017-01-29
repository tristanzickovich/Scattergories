<?php
	include 'sessionStart.php';
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		$gid = $_GET['gid'];
		include 'connectdb.php';
		$query = mysqli_query($db, "SELECT * FROM activegames WHERE gid='$gid'");
		$game = mysqli_fetch_array($query,MYSQLI_ASSOC);
		$roundTime = $game['roundTime'];
		$numPlayers = $game['numPlayers'];
		$list1 = $game['list1'];
		$list2 = $game['list2'];
		$list3 = $game['list3'];
		$currentRound = $game['currentRound'];
?>
<html>
	<head>
		<title>Scattergories</title>
		<link rel="stylesheet" type="text/css" href="./style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="general.js"></script>
	</head>
	<body onload="setTime(<?php echo $gid; ?>); revealElement('timeLeft'); revealElement('currentList');">
		<div id="timeLeft" class="hidden"></div>
		<?php
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
		
		<div id="currentList" class="hidden">
			<table id="listTable">
				<tr>
					<th> List <?php echo $curList; ?> </th>
				</tr>
				<tr>
					<th></th>
					<th>Item</th>
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
			} //closing brace for top php segment
			?>
			</table>
		</div>
	</body>
</html>