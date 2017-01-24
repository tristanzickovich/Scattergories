var numLists = 18;
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

//
function validateSetup(){
	var listArray = new Array();
	var roundTime = document.getElementById('roundTime').value;
	var numPlayers = document.getElementById('numPlayers').value;
	for(var i = 0; i < numLists; ++i){
		var tmpid = "L" + (i+1);
		if(document.getElementById(tmpid).checked)
			listArray.push(i+1);
	}
	if(listArray.length != 3)
		alert("Please select exactly 3 lists");
	else{ //send data through form
		var form = $('<form></form>');
		form.attr("class", "hidden");
		form.attr("method", "POST");
		form.attr("action","creategame.php")
		form.attr("enctype","multipart/form-data")

		//numPlayers
		var field1 = $('<input></input>');
		field1.attr("type", "number");
		field1.attr("name", "numPlayers");
		field1.attr("value", numPlayers);
		form.append(field1);
		//roundTime
		var field2 = $('<input></input>');
		field2.attr("type", "number");
		field2.attr("name", "roundTime");
		field2.attr("value", roundTime);
		form.append(field2);
		//list1
		var field3 = $('<input></input>');
		field3.attr("type", "number");
		field3.attr("name", "list1");
		field3.attr("value", listArray[0]);
		form.append(field3);
		//list2
		var field4 = $('<input></input>');
		field4.attr("type", "number");
		field4.attr("name", "list2");
		field4.attr("value", listArray[1]);
		form.append(field4);
		//list3
		var field5 = $('<input></input>');
		field5.attr("type", "number");
		field5.attr("name", "list3");
		field5.attr("value", listArray[2]);
		form.append(field5);

		//submit form
		$(document.body).append(form);
		$.ajax({
		    type: 'POST',
		    url: 'creategame.php',
		    data: $('form').serialize(),
		    success: function (data) {
		      window.location.href = "playgame.php?gid=" + data;
		    }
		});

	}
}