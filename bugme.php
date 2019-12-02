<?php //error_reporting(E_ERROR | E_WARNING | E_PARSE); 
$host = getenv('IP');
$username = 'root';
$password = 'naruto';
$dbname = 'bugme';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

// This is the option being sent to the controller
$option = $_REQUEST['request']; 

if (!$conn) {
	die("connection failed".mysql_connect_error());
}

// Controls all requests when an option is selected from the js
if(!empty($_REQUEST["request"])){
	if (session_status() == PHP_SESSION_NONE) {
    		session_start();
		}
	$request = $_REQUEST["request"];
	if ($request == 'login') {
		Login();
	}
	elseif ($request == 'logout') {
		logout();
	}
	elseif ($request == 'newIssue') {
		newIssue();
	}
	elseif ($request == 'submitIssue') {
		submitIssue();
	}
	elseif ($request == 'viewIssue') {
		viewIssue();
	}
	elseif ($request == 'details') {
		Details();
	}
	elseif ($request == 'update') {
		update();
	}

	elseif (isset($_SESSION['id']) && isset($_SESSION['email'])) {
		if ($request == 'adduserform' || $request == 'adduser') {
			if ($_SESSION['id']==1 && ($_SESSION['email']=='admin@bugme.com')) {
				if ($request == 'adduserform'){adduserform();}
				elseif ($request == 'adduser') {adduser();}
				else{echo "Error";}
				
			}
		}
		
		
	}
	
	else{
		echo 'wrong';
	}
}

function homePage(){
	$host = getenv('IP');
	$username = 'root';
	$password = 'naruto';
	$dbname = 'bugme';

	$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

	$stmt = $conn->prepare("SELECT * FROM Issues");
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC); ?>

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
			<h1>Issues</h1> <button type="button" style="background-color: green; " class="button" onclick="newIssue()">Create New Issue</button>
			<table class="table">
				<thead class="head">
					<tr>
						<th>Title</th>
						<th>Type</th>
						<th>Status</th>
						<th>Assigned To</th>
						<th>Created</th>
					</tr>
				</thead>
				<?php foreach ($results as $row): ?>
					<tr id= "issues" class="row">
						<td><a onclick="Details('<?php echo $row['id']?>')"><?= '#' . $row['id'] . $row['title']; ?></a></td>
						<td><?= $row['type']; ?></td>
						<td><?= $row['status']; ?></td>
						<td><?= $row['assigned_to'];?></td>
						<td><?= $row['created'];?></td>
					</tr>
				<?php endforeach; ?>
			</table> 
		</div>
	</div>

	<?php

}

function newIssue(){ 
	$host = getenv('IP');
	$username = 'root';
	$password = 'naruto';
	$dbname = 'bugme';

	$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

	$stmt = $conn->prepare("SELECT * FROM Issues");
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC); ?>

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
			<h1>Create Issue</h1>
			<ul>
				<li>Title<br><input class = "input" type="text" id="Firstname" name="title"></li>
				<li>Description<br><textarea class = "input" type="text" id="desc"></textarea></li>
				<li>Assigned To<br><select class = "dropDownMenu" type="text" id="assign">
					<?php foreach ($results as $row): ?>
						<option><?= $row['assigned_to']; ?></option>
					<?php endforeach; ?>
				</select></li>
				<li>Type<br><select class = "dropDownMenu" id="typ">
					<option value="" selected disabled style="color:grey;">Bug</option>
					<option value="Bug">Bug</option>
					<option value="Propasal">Propasal</option>
					<option value="Task">Task</option>
				</select></li>
				<li>Priority<br><select class = "dropDownMenu" id="priority" placeholder="Major">
					<option value="Minor">Minor</option>
					<option value="Major">Major</option>
					<option value="Critical">Critical</option>
				</select></li>
			</ul>
			<button type= "button" id="submitBtn" class="button">Submit</button> 
		</div>
	</div> <?php

} 

function Details(){
	$target = $_REQUEST['id'];

	$host = getenv('IP');
	$username = 'root';
	$password = 'naruto';
	$dbname = 'bugme';

	$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


	$stmt = $conn->prepare("SELECT * FROM Issues WHERE id = '$target'");
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC); ?>

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
			<h1><?php echo $results[0]['title'] ?></h1>

			<p style=";margin-top: -38px; font-weight: bold;"><?php echo('Issue #'. $results[0]['id']) ?></p>
			<p style="font-size: 16px;"><?php echo $results[0]['description'] ?></p>
			<P style="font-size: 16px;"><span style="color:grey; font-size: 14px; font-weight: bold;">></span><?php echo (" Issue was created on " . date('F',strtotime($results[0]['created'])) . " " . date('j',strtotime($results[0]['created'])) . " " . date('g:i a',strtotime($results[0]['created']))  );?>
			</P>
		</div>
	</div>

	<?php

}


function Login () {
	$host = getenv('IP');
	$username = 'root';
	$password = 'naruto';
	$dbname = 'bugme';

	$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

	$email = $_REQUEST['email'];
	$pwd = $_REQUEST['password'];

	$stmt = $conn->prepare("SELECT password, email FROM Users WHERE email = '$email'");
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	//print_r ($results);


	if ($email != $results[0]['email'] || $pwd != $results[0]['password']) {;
		?>

		<div>
			<div id="box2">
				<h1>Login</h1>
				<p style="color:red;margin-left: 28px;">Username or Password is incorrect</p>
				<ul>
					<li>Email<br><input class = "input" type="Email" id="Email" value ="admin@bugme.com"></li>
					<li>Password<br><input class = "input" type="Password" id="Password" value="password123"></li>
				</ul>
				<button type= "button" id="submitBtn" class="button" onclick= "Login()">Submit</button>
			</div>
		</div> <?php
	}else{
		//Edit this line to jump to a function for testing
		homePage();
	}

} ?>


