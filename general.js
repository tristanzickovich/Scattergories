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
