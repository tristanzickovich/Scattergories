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
		<div id="setupOptions">
			<form name="gamesettings">
				How Long Per Round?:<br/>
				<select id="roundTime">
					<option value="12"> 2 mins </option>
					<option value="135"> 2 mins 15 secs </option>
					<option value="150"> 2 mins 30 secs </option>
					<option value="165"> 2 mins 45 secs </option>
					<option value="180"> 3 mins </option>
				</select>
				<br/>Which Lists? (Select 3):
				<table id="listCheckbox">
					<tr>
						<td><input type="checkbox" id="L1">1</input></td>
						<td><input type="checkbox" id="L2">2</input></td>
						<td><input type="checkbox" id="L3">3</input></td>
						<td><input type="checkbox" id="L4">4</input></td>
						<td><input type="checkbox" id="L5">5</input></td>
						<td><input type="checkbox" id="L6">6</input></td>
					</tr>
					<tr>
						<td><input type="checkbox" id="L7">7</input></td>
						<td><input type="checkbox" id="L8">8</input></td>
						<td><input type="checkbox" id="L9">9</input></td>
						<td><input type="checkbox" id="L10">10</input></td>
						<td><input type="checkbox" id="L11">11</input></td>
						<td><input type="checkbox" id="L12">12</input></td>
					</tr>
					<tr>
						<td><input type="checkbox" id="L13">13</input></td>
						<td><input type="checkbox" id="L14">14</input></td>
						<td><input type="checkbox" id="L15">15</input></td>
						<td><input type="checkbox" id="L16">16</input></td>
						<td><input type="checkbox" id="L17">17</input></td>
						<td><input type="checkbox" id="L18">18</input></td>
					</tr>
				</table>
				<input type="button" value="Create Game" onclick="validateSetup('<?php print $user; ?>');">
			</form>
		</div>
	</body>
</html>