var numLists = 18;
function countDown(curgid){
	$.ajax({
		url: 'timeLeft.php',
		type: 'POST',
		data: {gid : curgid},
		success: function(secs){
			var element = document.getElementById("timeLeft");
			element.innerHTML = "time remaining: " + secs + " seconds";
			if(secs > 0)
				var timer = setTimeout('countDown('+curgid+') ', 300);
			else{
				element.innerHTML = "Round Over";
				revealElement("roundsScore");
				roundsAnswers();
			}
		}
	})
}

function roundsAnswers(){
	var answerSet = document.getElementsByClassName('roundAnswers');
	for(var i = 11; i >= 0; --i){
		var curitem = answerSet[i].value;
		var curloc = "ans" + i;
		curloc = document.getElementById(curloc);
		curloc.innerHTML = curitem;
	}
}

function setTime(curgid){
	$.ajax({
		url: 'setStartTime.php',
		type: 'POST',
		data: {gid : curgid},
		success: function(){
			countDown(curgid);
		}
	})
}

function rollDie(changes, reroll, host){
	var element = document.getElementById("die");
	var letter = String.fromCharCode(65 + (Math.floor((Math.random() * 26))));
	--changes;
	var rollRecurse = "rollDie(" + changes + ", " + reroll + ", '" + host + "')";
	if(changes > 10){
		element.innerHTML = letter;
		var timer = setTimeout(rollRecurse, 100);
	}
	else if(changes > 4){
		element.innerHTML = letter;
		var timer = setTimeout(rollRecurse, 200);
	}
	else if(changes > 1){
		element.innerHTML = letter;
		var timer = setTimeout(rollRecurse, 300);
	}
	else if(changes > 0){
		element.innerHTML = letter;
		var timer = setTimeout(rollRecurse, 400);
	}
	else{
		$.ajax({
			url: 'setLetter.php',
			type: 'POST',
			data: {letter : letter, host : host},
			success: function(data){
				element.innerHTML = '<strong>'+ letter + '</strong>';
				if(reroll == 0)
					revealElement("reroll");
				else
					revealElement("enterLobby");
			}
		})
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

function lobbyPlayers(gid){
	$.ajax({
		url: 'getPlayers',
		type: 'GET',
		data: {gid : gid},
		success: function(list){
			people = JSON.parse(list);
			var element = document.getElementById("lobbyPlayers");
			element.innerHTML = "Players in Lobby: <br/>";
			for(var i = 0; i < people.length; ++i){
				element.innerHTML += (people[i] + "<br/>");
			}
			var timer = setTimeout('lobbyPlayers('+gid+') ', 500);
		}
	})
}

function validateJoinGame(){
	var host = document.getElementById('gamehost').value;
	if(!host)
		alert("Please Enter Host Name");
	else{
		$.ajax({
		    type: 'GET',
		    url: 'checkJoinableGame.php',
		    data: {host : host},
		    success: function (data) {
		    	if(data >= 0)
		    		window.location.href = "waitLobby.php?gid=" + data;
		    	else
		    		alert('no game hosted by "'+host+'"');
		    }
		});
	}
}
function validateSetup(host){
	var listArray = new Array();
	var roundTime = document.getElementById('roundTime').value;
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
		form.attr("action","creategame.php");
		form.attr("enctype","multipart/form-data");

		//roundTime
		var field1 = $('<input></input>');
		field1.attr("type", "number");
		field1.attr("name", "roundTime");
		field1.attr("value", roundTime);
		form.append(field1);
		//list1
		var field2 = $('<input></input>');
		field2.attr("type", "number");
		field2.attr("name", "list1");
		field2.attr("value", listArray[0]);
		form.append(field2);
		//list2
		var field3 = $('<input></input>');
		field3.attr("type", "number");
		field3.attr("name", "list2");
		field3.attr("value", listArray[1]);
		form.append(field3);
		//list3
		var field4 = $('<input></input>');
		field4.attr("type", "number");
		field4.attr("name", "list3");
		field4.attr("value", listArray[2]);
		form.append(field4);
		//host
		var field5 = $('<input></input>');
		field5.attr("type", "text");
		field5.attr("name", "host");
		field5.attr("value", host);
		form.append(field5);

		//submit form
		$(document.body).append(form);
		$.ajax({
		    type: 'POST',
		    url: 'creategame.php',
		    data: $('form').serialize(),
		    success: function (data) {
		    	window.location.href = "waitLobby.php?gid=" + data;
		    }
		});
	}
}

function verifyInput(){
	var username = document.getElementById('username').value;
	var password = document.getElementById('password').value;
	if(!username || !password){
		alert("please enter a username and password");
	}
	else{
		validateRegistration();
	}
}

function validateRegistration(){
	var username = document.getElementById('username').value;
	var password = document.getElementById('password').value;
	var form = $('<form></form>');
	form.attr("class", "hidden");
	form.attr("method", "POST");
	form.attr("action","validateRegistration.php");
	form.attr("enctype","multipart/form-data");
	//username
	var field1 = $('<input></input>');
	field1.attr("type", "text");
	field1.attr("name", "username");
	field1.attr("value", username);
	form.append(field1);
	//password
	var field2 = $('<input></input>');
	field2.attr("type", "password");
	field2.attr("name", "password");
	field2.attr("value", password);
	form.append(field2);
	$(document.body).append(form);
	$.ajax({
	    type: 'POST',
	    url: 'validateRegistration.php',
	    data: $('form').serialize(),
	    success: function (data) {
	    	if(data == 0){ //username exists
	    		var curdoc = document.getElementById("registerMessage");
	    		curdoc.innerHTML = "Username already exists";
	    	}
	    	else{
	    		window.location.href = "home.php";
	    	}
	    }
	});
}

function validateLogin(){
	var username = document.getElementById('username1').value;
	var password = document.getElementById('password1').value;
	var form = $('<form></form>');
	form.attr("class", "hidden");
	form.attr("method", "POST");
	form.attr("action","validateLogin.php");
	form.attr("enctype","multipart/form-data");
	//username
	var field1 = $('<input></input>');
	field1.attr("type", "text");
	field1.attr("name", "username");
	field1.attr("value", username);
	form.append(field1);
	//password
	var field2 = $('<input></input>');
	field2.attr("type", "password");
	field2.attr("name", "password");
	field2.attr("value", password);
	form.append(field2);
	$(document.body).append(form);

	$.ajax({
	    type: 'POST',
	    url: 'validateLogin.php',
	    data: $('form').serialize(),
	    success: function (data) {
	    	if(data == 0){ //invalid login
	    		var curdoc = document.getElementById("loginMessage");
	    		curdoc.innerHTML = "Username or Password is incorrect. Please try again.";
	    	}
	    	else{
				window.location.href = "home.php";
	    	}
	    }
	});
}

function enterLobby(host){
	var form = $('<form></form>');
	form.attr("class", "hidden");
	form.attr("method", "GET");
	form.attr("action","getGID.php");

	var field1 = $('<input></input>');
	field1.attr("type", "text");
	field1.attr("name", "host");
	field1.attr("value", host);
	form.append(field1);
	$(document.body).append(form);
	$.ajax({
	    type: 'GET',
	    url: 'getGID.php',
	    data: $('form').serialize(),
	    success: function (data) {
	    	window.location.href = "playgame.php?gid="+data;
	    }
	});
}

function updateScore(round, player){
	var score = document.getElementById('curRoundScore').value;
	$.ajax({
		url: 'setRoundScore.php',
		type: 'POST',
		data: {round : round, player : player, score : score},
		success: function(){
			hideElement("roundsScore");
		}
	})
}

function nextRound(round, host, gid){
	$.ajax({
		url: 'nextRound.php',
		type: 'GET',
		data: {round : round, host : host},
		success: function(data){
			if(data == 0){
				window.location.href = "waitLobby.php?gid=" + gid;
			}
			else{
				alert("game over");
			}
		}
	})
}