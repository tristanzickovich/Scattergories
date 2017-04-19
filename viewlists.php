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
	<button onclick='window.location.href="home.php";' class="btn btn-secondary">home</button> <br/>
	<div class="content-scope">
	<div id="accordion" role="tablist" aria-multiselectable="true">
	<?php
		define('myConst', TRUE);
		include 'printlist.php';
		for($i = 0; $i < $numLists; ++$i){
			Print'
				<div class="card">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$i.'" aria-expanded="true" aria-controls="collapse'.$i.'">
			    <div class="card-header" role="tab" id="heading'.$i.'">
			      <h5 class="mb-0">
			          List #'.($i + 1).'
			      </h5>
			    </div>
			    </a>

			    <div id="collapse'.$i.'" class="collapse" role="tabpanel" aria-labelledby="heading'.$i.'">
			      <div class="card-block">
			';
			$listitems = retrieveList($i + 1);
			//Print 'List ' . ($i + 1);
	?>
	<div class="allLists">
		<table class="listTable table">
		<thead class="thead-inverse">
			<tr>
				<th colspan="2" align="center">Item</th>
			</tr>
		</thead>
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
		Print'

		      </div>
		    </div>
		  </div>
		';
		}
	?>
	</div>
	</div>
	</body>
</html>