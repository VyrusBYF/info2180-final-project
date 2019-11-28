<?php //error_reporting(E_ERROR | E_WARNING | E_PARSE); 
$host = getenv('IP');
$username = 'root';
$password = 'naruto';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$userDetails = json_decode($_POST['user']);
print_r($userDetails[0]);


?>
<h1>I Was Replaced</h1>
		<ul>
			<li>Replaced<br><input class = "input" type="text" id="Firstname" name="Firstname"></li>
			<li>Replaced<br><input class = "input" type="text" id="Lastname"></li>
			<li>Replaced<br><input class = "input" type="Password" id="Password"></li>
			<li>Replaced<br><input class = "input" type="Email" id="Email"></li>
		</ul>
		<button type= "button" id="submitBtn" class="button">Replaced</button>