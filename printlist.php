<?php
	$numLists = 18; //number of lists to choose from
	function retrieveList($listnum){
		$listitems = array("","","","","","","","","","","","");
		$ct = 0;
		$listLocation = "./lists/list".$listnum.".txt";
		//read game list
		$gamelist = fopen($listLocation, "r") or die("Unable to open file.");

		//load array with list
		while(!feof($gamelist)){
			$listitems[$ct] = fgets($gamelist);
			++$ct;
		}

		//close file
		fclose($gamelist);
		return $listitems;
	}
?>