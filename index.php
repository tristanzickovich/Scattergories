<html>
	<head>
		<title>Scattergories</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="general.js"></script>
	</head>
	<body>
		<h1 id="mainlogo">Scattergories</h1>
		<div id="postloginLinks">
		</div>
		<div id="preloginLinks">
			<a href="javascript:void(0)" onclick="revealElement('login'); hideElement('createAccount')";>login</a>
			<a href="javascript:void(0)" onclick="revealElement('createAccount'); hideElement('login');">create account</a>
		</div>
		<div id="login" class="hidden">
			<form>
				<h2>Please sign in</h2>
				Username: 
				<input type="text" id="username1" placeholder="Username" required="required"/>
				Password: 
				<input type="password" id="password1" placeholder="Password" required="required"/><br/>	
				<input type="button" value="Login" onclick="validateLogin()">
			</form>
		</div>
		<div id="loginMessage">
		</div>
		<div id="createAccount" class="hidden">
			<form>
				<h2>Account Creation</h2>
				Enter Desired Username:
				<input type="text" placeholder="Username" id="username" required="required" /> <br/>
				Enter a Password: 
				<input type="password" placeholder="Password" id="password" required="required" /> <br/>
				<input type="button" value="Create" onclick="verifyInput()">
			</form>
		</div>
		<div id="registerMessage">
		</div>
	</body>
</html>