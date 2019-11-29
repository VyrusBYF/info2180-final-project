<?php include('test.php') ?>


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
			<h1>I Was Replaced</h1>
			<ul>
				<li>Replaced<br><input class = "input" type="text" id="Firstname" name="Firstname"></li>
				<li>Replaced<br><input class = "input" type="text" id="Lastname"></li>
				<li>Replaced<br><input class = "input" type="Password" id="Password"></li>
				<li>Replaced<br><input class = "input" type="Email" id="Email"></li>
			</ul>
			<button type= "button" id="submitBtn" class="button">Submit</button>
		</div>
	</div>