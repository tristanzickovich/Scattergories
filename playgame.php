<?php
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		$gid = $_GET['gid'];
		include 'connectdb.php';
		$query = mysqli_query($db, "SELECT * FROM activegames WHERE gid='$gid'");
		$game = mysqli_fetch_array($query,MYSQLI_ASSOC);
		$roundTime = $game['roundTime'];
		$numPlayers = $game['numPlayers'];
?>
<html>
	<head>
		<title>Scattergories</title>
		<link rel="stylesheet" type="text/css" href="./style.css">
		<script type="text/javascript" src="general.js"></script>
	</head>
	<body>
		<a href='Scattergories.html'>HOME</a>
		<div id="rollButton">
			<button onclick=" hideElement('rollButton'); rollDie(15)">ROLL DIE</button>
		</div>
		<div id="die"></div>
		<div id="status"></div>
		<script type="text/javascript"> countDown(<?php print $roundTime ?>,"status");</script>

		<?php
			$listitems = array("","","","","","","","","","","","");
			$ct = 0;

			//read game list
			$gamelist = fopen("list1.txt", "r") or die("Unable to open file.");

			//load array with list
			while(!feof($gamelist)){
				$listitems[$ct] = fgets($gamelist);
				++$ct;
			}
			//close file
			fclose($gamelist);

		?>
		
		<table>
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
	</body>
</html>