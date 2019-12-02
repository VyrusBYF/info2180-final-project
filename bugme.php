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
		Logout();
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
	elseif ($request == 'home') {
		homePage($_REQUEST['user']);
	}
	elseif ($request == 'newUser') {
		newUser();
	}
	elseif ($request == 'createUser') {
		createUser();
	}
	elseif ($request == 'details') {
		Details();
	}
	elseif ($request == 'update') {
		update();
	}	
	else{
		echo 'wrong';
	}
}

function homePage($x){
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
					<li><i class="fas fa-home"></i><a href="#home" data-target="home" onclick="Home()">Home</a></li>
					<li><i class="icon ion-md-person-add"></i><a href="#user" data-target="user" onclick="newUser()">Add User</a></li>
					<li><i class="fas fa-plus-circle"></i><a href="#issue" data-target="issue" onclick="newIssue()">New Issue</a></li>
					<li><i class="fas fa-power-off"></i><a href ="#Logout"data-target="logout" onclick="Logout()">Logout</a></li>
				</ul>
		</div>
		<div id="box2"> 
			<h1>Issues</h1> <button type="button" style="background-color: green; " class="button" onclick="newIssue(<?php echo $x ?>)">Create New Issue</button>
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

	$stmt = $conn->prepare("SELECT DISTINCT * FROM Users");
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$user = $_REQUEST['user']; ?>

	<div id="grid" class = "grid">
		<div class = "banner" id= "banner">
			<ul>
				<li><i class="icon ion-md-bug" style="color:white; font-size: 24px;"></i> BugMe Issue Tracker</li>
			</ul>
		</div>
		<div id= "box1">
				<ul id = "icons">
					<li><i class="fas fa-home"></i><a href="#home" data-target="home" onclick="Home()">Home</a></li>
					<li><i class="icon ion-md-person-add"></i><a href="#user" data-target="user" onclick="newUser()">Add User</a></li>
					<li><i class="fas fa-plus-circle"></i><a href="#issue" data-target="issue" onclick="newIssue()">New Issue</a></li>
					<li><i class="fas fa-power-off"></i><a href ="#Logout"data-target="logout" onclick="Logout()">Logout</a></li>
				</ul>
		</div>
		<div id="box2"> 
			<h1>Create Issue</h1>
			<ul>
				<li>Title<br><input class = "input" type="text" id="title" ></li>
				<li>Description<br><textarea class = "input" type="text" id="desc"></textarea></li>
				<li>Assigned To<br><select class = "dropDownMenu" type="text" id="assign">
					<option value="" disabled selected hidden>Marcia Brady</option>
					<?php foreach ($results as $row): ?>
						<option><?= $row['firstname'] . " " . $row['lastname']; ?></option>
					<?php endforeach; ?>
				</select></li>
				<li>Type<br><select class = "dropDownMenu" id="typ">
					<option value="" disabled selected hidden>Bug</option>
					<option value="Bug">Bug</option>
					<option value="Proposal">Proposal</option>
					<option value="Task">Task</option>
				</select></li>
				<li>Priority<br><select class = "dropDownMenu" id="priority">
					<option value="" disabled selected hidden>Major</option>
					<option value="Minor">Minor</option>
					<option value="Major">Major</option>
					<option value="Critical">Critical</option>
				</select></li>
			</ul>
			<button type= "button" id="submitBtn" class="button" onclick="submitIssue(<?php echo $user ?>)">Submit</button> 
		</div>
	</div> <?php

}

function newUser(){ ?>
	<div id="grid" class = "grid">
			<div class = "banner" id= "banner">
				<ul>
					<li><i class="icon ion-md-bug" style="color:white; font-size: 24px;"></i> BugMe Issue Tracker</li>
				</ul>
			</div>
			<div id= "box1">
				<ul id = "icons">
					<li><i class="fas fa-home"></i><a href="#home" data-target="home" onclick="Home()">Home</a></li>
					<li><i class="icon ion-md-person-add"></i><a href="#user" data-target="user" onclick="newUser()">Add User</a></li>
					<li><i class="fas fa-plus-circle"></i><a href="#issue" data-target="issue" onclick="newIssue()">New Issue</a></li>
					<li><i class="fas fa-power-off"></i><a href ="#Logout"data-target="logout" onclick="Logout()">Logout</a></li>
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
				<button type= "button" id="submitBtn" class="button" onclick="createUser()">Submit</button>
			</div>
		</div> <?php

}
function createUser(){
	$host = getenv('IP');
	$username = 'root';
	$password = 'naruto';
	$dbname = 'bugme';

	$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

	$fname = $_REQUEST['fname'];
	$lname = $_REQUEST['lname'];
	$pwd = $_REQUEST['password'];
	$email = $_REQUEST['email'];

	$stmt = $conn->prepare("INSERT INTO Users VALUES('','$fname','$lname','$pwd','$email', NOW())");
	$stmt->execute();

	$stmt = $conn->prepare("SELECT DISTINCT * FROM Users");
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
					<li><i class="fas fa-home"></i><a href="#home" data-target="home" onclick="Home()">Home</a></li>
					<li><i class="icon ion-md-person-add"></i><a href="#user" data-target="user" onclick="newUser()">Add User</a></li>
					<li><i class="fas fa-plus-circle"></i><a href="#issue" data-target="issue" onclick="newIssue()">New Issue</a></li>
					<li><i class="fas fa-power-off"></i><a href ="#Logout"data-target="logout" onclick="Logout()">Logout</a></li>
				</ul>
			</div>
			<div id="box2"> 
				<h1>New User</h1>
				<p style="color:blue;margin-left: 28px;">User Has Been Created!</p>
				<ul>
					<li>Firstname<br><input class = "input" type="text" id="Firstname" name="Firstname"></li>
					<li>Lastname<br><input class = "input" type="text" id="Lastname"></li>
					<li>Password<br><input class = "input" type="Password" id="Password"></li>
					<li>Email<br><input class = "input" type="Email" id="Email"></li>
				</ul>
				<button type= "button" id="submitBtn" class="button" onclick="createUser()">Submit</button>
			</div>
		</div> <?php

}

function submitIssue(){
	$host = getenv('IP');
	$username = 'root';
	$password = 'naruto';
	$dbname = 'bugme';

	$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

	$title = $_REQUEST['title'];
	$desc = $_REQUEST['desc'];
	$ass = $_REQUEST['ass'];
	$typ = $_REQUEST['type'];
	$priority = $_REQUEST['priority'];

	$user = $_REQUEST['user'];

	$stmt = $conn->prepare("SELECT firstname, lastname FROM Users WHERE id = '$user' ");
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$user = $results[0]['firstname'] . " " .$results[0]['lastname'];


	$stmt = $conn->prepare("INSERT INTO Issues VALUES('','$title' , '$desc' , '$typ', '$priority','OPEN','$ass','$user', NOW(), NOW())");
	$stmt->execute();

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
					<li><i class="fas fa-home"></i><a href="#home" data-target="home" onclick="Home()">Home</a></li>
					<li><i class="icon ion-md-person-add"></i><a href="#user" data-target="user" onclick="newUser()">Add User</a></li>
					<li><i class="fas fa-plus-circle"></i><a href="#issue" data-target="issue" onclick="newIssue()">New Issue</a></li>
					<li><i class="fas fa-power-off"></i><a href ="#Logout"data-target="logout" onclick="Logout()">Logout</a></li>
				</ul>
		</div>
		<div id="box2"> 
			<h1>Create Issue</h1>
			<p style="color:blue;margin-left: 28px;">Your Issue Has Been Logged!</p>

			<ul>
				<li>Title<br><input class = "input" type="text" id="title" ></li>
				<li>Description<br><textarea class = "input" type="text" id="desc"></textarea></li>
				<li>Assigned To<br><select class = "dropDownMenu" type="text" id="assign">
					<option value="" disabled selected hidden>Marcia Brady</option>
					<?php foreach ($results as $row): ?>
						<option><?= $row['assigned_to']; ?></option>
					<?php endforeach; ?>
				</select></li>
				<li>Type<br><select class = "dropDownMenu" id="typ">
					<option value="" disabled selected hidden>Bug</option>
					<option value="Bug">Bug</option>
					<option value="Proposal">Proposal</option>
					<option value="Task">Task</option>
				</select></li>
				<li>Priority<br><select class = "dropDownMenu" id="priority">
					<option value="" disabled selected hidden>Major</option>
					<option value="Minor">Minor</option>
					<option value="Major">Major</option>
					<option value="Critical">Critical</option>
				</select></li>
			</ul>
			<button type= "button" id="submitBtn" class="button" onclick="submitIssue()">Submit</button> 
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
					<li><i class="fas fa-home"></i><a href="#home" data-target="home" onclick="Home()">Home</a></li>
					<li><i class="icon ion-md-person-add"></i><a href="#user" data-target="user" onclick="newUser()">Add User</a></li>
					<li><i class="fas fa-plus-circle"></i><a href="#issue" data-target="issue" onclick="newIssue()">New Issue</a></li>
					<li><i class="fas fa-power-off"></i><a href ="#Logout"data-target="logout" onclick="Logout()">Logout</a></li>
				</ul>
		</div>
		<div id="box2"> 
			<h1><?php echo $results[0]['title'] ?></h1>
			<p style=";margin-top: -38px; font-weight: bold;"><?php echo('Issue #'. $results[0]['id']) ?></p><br>
			<p style="width:42%;font-weight: bold;"><?php echo $results[0]['description'] ?></p>
			<ul id="issueDesc">
				<li style="font-size: 16px;"></li>
				<li style="font-size: 16px;margin-top: 70px;"><?php echo (" Issue was created on " . date('F',strtotime($results[0]['created'])) . " " . date('j',strtotime($results[0]['created'])) . " " . date('g:i a',strtotime($results[0]['created']))  );?>
				</li>
			</ul>
			
		</div>
	</div>

	<?php

}


function Login() {
	$host = getenv('IP');
	$username = 'root';
	$password = 'naruto';
	$dbname = 'bugme';

	$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

	$email = $_REQUEST['email'];
	$pwd = $_REQUEST['password'];

	$stmt = $conn->prepare("SELECT password, email, id FROM Users WHERE email = '$email'");
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
		homePage($results[0]['id']);
	}

}   

function Logout(){ 
	if (session_status() == PHP_SESSION_NONE) {
    	session_start();
	}
	session_unset();
	session_destroy(); ?>

	<div>
		<div id="box2">
			<h1>Login</h1>
			<ul>
				<li>Email<br><input class = "input" type="Email" id="Email" value ="admin@bugme.com"></li>
				<li>Password<br><input class = "input" type="Password" id="Password" value="password123"></li>
			</ul>
			<button type= "button" id="submitBtn" class="button" onclick= "Login()">Submit</button>
		</div>
	</div> <?php
}  ?>


