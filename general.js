function countDown(secs, elem){
	var element = document.getElementById(elem);
	element.innerHTML = "time remaining: " + secs + " seconds";
	if(secs > 0){
		--secs;
		var timer = setTimeout('countDown('+secs+',"'+elem+'") ', 1000); //1 sec timer
	}
	else{
		clearTimeout(timer);
		element.innerHTML = '<h2> Round Over! </h2>';
		element.innerHTML = '<a href="#"> click to continue </a>';
	}
}

function rollDie(changes, reroll){
	var element = document.getElementById("die");
	var letter = String.fromCharCode(65 + (Math.floor((Math.random() * 26))));
	--changes;
	if(changes > 10){
		element.innerHTML = letter;
		var timer = setTimeout('rollDie('+changes+', '+reroll+')', 100);
	}
	else if(changes > 4){
		element.innerHTML = letter;
		var timer = setTimeout('rollDie('+changes+', '+reroll+')', 200);
	}
	else if(changes > 1){
		element.innerHTML = letter;
		var timer = setTimeout('rollDie('+changes+', '+reroll+')', 300);
	}
	else if(changes > 0){
		element.innerHTML = letter;
		var timer = setTimeout('rollDie('+changes+', '+reroll+')', 400);
	}
	else{
		element.innerHTML = '<strong>'+ letter + '</strong>';
		if(reroll == 0)
			revealElement("reroll");
		else
			revealElement("ready");
	}

}

function hideElement(divID){
	var item = document.getElementById(divID);
	item.className = 'hidden';
}
function revealElement(divID){
	var item = document.getElementById(divID);
	item.className = 'revealed';
}