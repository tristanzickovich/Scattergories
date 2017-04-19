<?php
	session_start();
	if(isset($_SESSION['user'])){ //user already logged in
		header("location:home.php");
		exit();
	}
?>
<html>
	<head>
		<title>Scattergories</title>
		<?php
			include 'header.php';
		?>
	</head>
	<body>
		<div id="preloginLinks" class="content-scope">
			<h1 id="mainlogo">Scattergories</h1>
			<button type="button" class="btn btn-secondary btn-md" data-toggle="modal" data-target="#myModal">Login</button>
			<button type="button" class="btn btn-secondary btn-md" data-toggle="modal" data-target="#myModal2">Create Account</button>
		</div>

	  	<div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog">
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	        	<h4 class="modal-title">Login</h4>
	            <button type="button" class="close" data-dismiss="modal">&times;</button>
	        </div>
	        <div class="modal-body">
	         	<form>
					<h3>Please Enter Login Credentials</h3>
					<br/>
					<div class="input-group">
					  <span class="input-group-addon" id="basic-addon1">Username</span>
					  <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1" id="username1">
					</div>
					<br/>
					<div class="input-group">
					  <span class="input-group-addon" id="basic-addon1">Password&nbsp</span>
					  <input type="password" id="password1" class="form-control" placeholder="Password" aria-describedby="basic-addon1" id="username1">
					</div>
					<br/>
					<input type="button" class="btn btn-info" value="Login" onclick="validateLogin()">
				</form>
	        </div>
	        <div class="modal-footer">
		        <div id="loginMessage">
		        </div>
	     	</div>
		      
		   </div>
		</div>
		</div>

		<div class="modal fade" id="myModal2" role="dialog">
	    <div class="modal-dialog">
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	        	<h4 class="modal-title">Create Account</h4>
	            <button type="button" class="close" data-dismiss="modal">&times;</button>
	        </div>
	        <div class="modal-body">
	         	<form>
	         		<h3>Please Enter Desired Credentials</h3>
					<br/>
					<div class="input-group">
					  <span class="input-group-addon" id="basic-addon1">Desired Username</span>
					  <input type="text" id="username" class="form-control" placeholder="Username" aria-describedby="basic-addon1" required>
					</div>
					<br/>
					<div class="input-group">
					  <span class="input-group-addon" id="basic-addon1">Password</span>
					  <input type="password" id="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1" required>
					</div>
					<br/>
					<input type="button" class="btn btn-info" value="Create" onclick="verifyInput()">
				</form>
	        </div>
	        <div class="modal-footer">
		        <div id="registerMessage">
	     		</div>
		   </div>
		</div>
		</div>
	</body>
</html>