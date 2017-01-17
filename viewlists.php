<html>
	<head>
		<title>Scattergories</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
<?php
	include 'printlist.php';
	for($i = 0; $i < $numLists; ++$i){
		$listitems = retrieveList($i + 1);
		Print 'List ' . ($i + 1);
?>
<div class="allLists">
	<table>
		<tr>
			<th></th>
			<th>Item</th>
		</tr>
	<?php
		for($j = 0; $j < 12; ++$j){
			Print '<tr>';
			Print '<td>' . ($j + 1) . '. </td>';
			Print '<td>' . $listitems[$j] . '</td>';
			Print '<tr>';
		}
	?>
	</table> <br/>
</div>
<?php
	}
?>
	</body>
</html>