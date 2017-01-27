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

		$letterRolled = 'A';
?>
<html>
	<head>
		<title>Scattergories</title>
		<link rel="stylesheet" type="text/css" href="./style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="general.js"></script>
	</head>
	<body>
		<div id="timeLeft" class="hidden"></div>
		<?php
			include 'printlist.php';
			if($currentRound == 1)
				$listitems = retrieveList($list1);
			else if($currentRound == 2)
				$listitems = retrieveList($list2);
			else if($currentRound == 3)
				$listitems = retrieveList($list3);
		?>
		
		<div id="currentList" class="hidden">
			<table id="listTable">
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
					Print '<td><input type="text"></td>';
					Print '<tr>';
				}
			} //closing brace for top php segment
			?>
			</table>
		</div>
	</body>
</html>