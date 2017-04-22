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
		<div id="setupOptions" class="content-scope">
			<h2>Game Preferences</h2>
			<hr>
			<form name="gamesettings">
				How Long Per Round?:<br/>
				<select id="roundTime" class="custom-select">
					<option value="12" selected> 2 mins </option>
					<option value="135"> 2 mins 15 secs </option>
					<option value="150"> 2 mins 30 secs </option>
					<option value="165"> 2 mins 45 secs </option>
					<option value="180"> 3 mins </option>
				</select>
				<br/><br/>Which Lists? (Select 3):
				<table id="listCheckbox">
					<tr>
						<td><input type="checkbox" id="L1">
							<a href="#" onclick="updateListModal(1);" data-toggle="modal" data-target="#listModal">1</a>
						</input></td>
						<td><input type="checkbox" id="L2">
							<a href="#" onclick="updateListModal(2);" data-toggle="modal" data-target="#listModal">2</a>
						</input></td>
						<td><input type="checkbox" id="L3">
							<a href="#" onclick="updateListModal(3);" data-toggle="modal" data-target="#listModal">3</a>
						</input></td>
						<td><input type="checkbox" id="L4">
							<a href="#" onclick="updateListModal(4);" data-toggle="modal" data-target="#listModal">4</a>
						</input></td>
						<td><input type="checkbox" id="L5">
							<a href="#" onclick="updateListModal(5);" data-toggle="modal" data-target="#listModal">5</a>
						</input></td>
						<td><input type="checkbox" id="L6">
							<a href="#" onclick="updateListModal(6);" data-toggle="modal" data-target="#listModal">6</a>
						</input></td>
					</tr>
					<tr>
						<td><input type="checkbox" id="L7">
							<a href="#" onclick="updateListModal(7);" data-toggle="modal" data-target="#listModal">7</a>
						</input></td>
						<td><input type="checkbox" id="L8">
							<a href="#" onclick="updateListModal(8);" data-toggle="modal" data-target="#listModal">8</a>
						</input></td>
						<td><input type="checkbox" id="L9">
							<a href="#" onclick="updateListModal(9);" data-toggle="modal" data-target="#listModal">9</a>
						</input></td>
						<td><input type="checkbox" id="L10">
							<a href="#" onclick="updateListModal(10);" data-toggle="modal" data-target="#listModal">10</a>
						</input></td>
						<td><input type="checkbox" id="L11">
							<a href="#" onclick="updateListModal(11);" data-toggle="modal" data-target="#listModal">11</a>
						</input></td>
						<td><input type="checkbox" id="L12">
							<a href="#" onclick="updateListModal(12);" data-toggle="modal" data-target="#listModal">12</a>
						</input></td>
					</tr>
					<tr>
						<td><input type="checkbox" id="L13">
							<a href="#" onclick="updateListModal(13);" data-toggle="modal" data-target="#listModal">13</a>
						</input></td>
						<td><input type="checkbox" id="L14">
							<a href="#" onclick="updateListModal(14);" data-toggle="modal" data-target="#listModal">14</a>
						</input></td>
						<td><input type="checkbox" id="L15">
							<a href="#" onclick="updateListModal(15);" data-toggle="modal" data-target="#listModal">15</a>
						</input></td>
						<td><input type="checkbox" id="L16">
							<a href="#" onclick="updateListModal(16);" data-toggle="modal" data-target="#listModal">16</a>
						</input></td>
						<td><input type="checkbox" id="L17">
							<a href="#" onclick="updateListModal(17);" data-toggle="modal" data-target="#listModal">17</a>
						</input></td>
						<td><input type="checkbox" id="L18">
							<a href="#" onclick="updateListModal(18);" data-toggle="modal" data-target="#listModal">18</a>
						</input></td>
					</tr>
				</table>
				<br/>
				<input type="button" class="btn btn-secondary" value="Create Game" onclick="validateSetup('<?php print $user; ?>');">
			</form>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="listModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="listModalLabel">Modal title</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div id="listModalBody" class="modal-body">
		        ...
		      </div>
		    </div>
		  </div>
		</div>
	</body>
</html>