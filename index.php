<?php
require "bugme.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>BugMe Issue Tracker</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
		<script src="bugme.js"></script>
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	</head>
	<div id="container">
		<div>
			<div id="box2"> 
				<h1>Login</h1>
				<ul>
					<li>Email<br><input class = "input" type="Email" id="Email" value ="admin@bugme.com"></li>
					<li>Password<br><input class = "input" type="Password" id="Password" value="password123"></li>
				</ul>
				<button type= "button" id="submitBtn" class="button" onclick= "Login()">Submit</button>
			</div>
		</div>
	</div>
</html>

<!--
<!DOCTYPE html>
<html>
	<head>
		<title>BugMe Issue Tracker</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
		<script src="bugme.js"></script>
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	</head>
	<div id="grid" class = "grid">
		<div class = "banner" id= "banner">
			<ul>
				<li><i class="icon ion-md-bug" style="color:white; font-size: 24px;"></i> BugMe Issue Tracker</li>
			</ul>
		</div>
		<div id= "box1">
				<ul id = "icons">
					<li><i class="fas fa-home"></i><a href="#home" data-target="home">Home</a></li>
					<li><i class="icon ion-md-person-add"></i><a href="#user" data-target="user">Add User</a></li>
					<li><i class="fas fa-plus-circle"></i><a href="#issue" data-target="issue">New Issue</a></li>
					<li><i class="fas fa-power-off"></i><a href ="#Logout"data-target="logout">Logout</a></li>
				</ul>
		</div>
		<div id="box2"> 
			<h1>New User</h1>
			<ul>
				<li>Firstname<br><input class = "input" type="text" id="Firstname" name="Firstname"></li>
				<li>Lastname<br><input class = "input" type="text" id="Lastname"></li>
				<li>Password<br><input class = "input" type="Password" id="Password"></li>
				<li>Email<br><input class = "input" type="Email" id="Email"></li>
			</ul>
			<button type= "button" id="submitBtn" class="button">Submit</button>
		</div>
	</div>
</html> -->