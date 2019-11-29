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
		login();
	}
	elseif ($request == 'home') {
		if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
			$fil=$_REQUEST['filter'];
			alltickets($fil);
		}
	}
	elseif ($request == 'logout') {
		logout();
	}
	elseif ($request == 'sIssueform') {
		submitIssueform();
	}
	elseif ($request == 'submitIssue') {
		submitIssue();
	}
	elseif ($request == 'viewIssue') {
		viewIssue();
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


function login () {
	$host = getenv('IP');
	$username = 'root';
	$password = 'naruto';
	$dbname = 'bugme';

	$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

	$email = $_REQUEST['email'];
	$pwd = $_REQUEST['password'];


	if (empty($email) || empty($pwd)) {;
		exit();
	}
	
	$stmt = $conn->prepare("SELECT password FROM Users WHERE email = '$email'");
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	print_r ($results);

	if ($pwd == $results[0]['password']){ ?>
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
		</div> <?php
	}
		
		
	?>

<?php }

?>