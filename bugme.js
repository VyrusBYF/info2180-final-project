function Login(){

	var request = "login";
	
	var xhttp = new XMLHttpRequest();
	var url = "bugme.php";

	var email = document.getElementById("Email").value;
	var password = document.getElementById("Password").value;

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState === xhttp.DONE) {
				if (xhttp.status === 200) {
					var response = xhttp.responseText;
					document.getElementById("container").innerHTML=response;
				} else {
					alert('There was a problem with the request.');
				}
		} 
		}
		xhttp.open("GET", url+"?request="+request+"&email="+email+"&password="+password,true);
		xhttp.send();
}

function Logout(){

	var request = "logout";
	
	var xhttp = new XMLHttpRequest();
	var url = "bugme.php";

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState === xhttp.DONE) {
				if (xhttp.status === 200) {
					var response = xhttp.responseText;
					document.getElementById("container").innerHTML=response;
				} else {
					alert('There was a problem with the request.');
				}
		} 
		}
		xhttp.open("GET", url+"?request="+request,true);
		xhttp.send();
}

function Home(x){

	var request = "home";
	
	var xhttp = new XMLHttpRequest();
	var url = "bugme.php";

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState === xhttp.DONE) {
				if (xhttp.status === 200) {
					var response = xhttp.responseText;
					document.getElementById("container").innerHTML=response;
				} else {
					alert('There was a problem with the request.');
				}
		} 
		}
		xhttp.open("GET", url+"?request="+request+"&user="+x,true);
		xhttp.send();
}



function newUser(){

	var request = "newUser";
	
	var xhttp = new XMLHttpRequest();
	var url = "bugme.php";

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState === xhttp.DONE) {
				if (xhttp.status === 200) {
					var response = xhttp.responseText;
					document.getElementById("container").innerHTML=response;
				} else {
					alert('There was a problem with the request.');
				}
		} 
		}
		xhttp.open("GET", url+"?request="+request,true);
		xhttp.send();
}

function newIssue(x){
	//alert("I work");

	var request = "newIssue";
	
	var xhttp = new XMLHttpRequest();
	var url = "bugme.php";

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState === xhttp.DONE) {
				if (xhttp.status === 200) {
					var response = xhttp.responseText;
					document.getElementById("container").innerHTML=response;
				} else {
					alert('There was a problem with the request.');
				}
		} 
		}
		xhttp.open("GET", url+"?request="+request+"&user="+x,true);
		xhttp.send();
}

function Details(x){
	/*alert("I work");
	console.log(x);*/
	
	var request = "details"
	
	var xhttp = new XMLHttpRequest();
	var url = "bugme.php";

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState === xhttp.DONE) {
				if (xhttp.status === 200) {
					var response = xhttp.responseText;
					document.getElementById("container").innerHTML=response;
				} else {
					alert('There was a problem with the request.');
				}
		} 
		}
		xhttp.open("GET", url+"?request="+request+"&id="+x,true);
		xhttp.send();
}

function submitIssue(x){
	//alert("I work");

	var request = "submitIssue";
	
	var title = document.getElementById("title").value;
	var desc = document.getElementById("desc").value;
	var ass = document.getElementById("assign").value;
	var typ = document.getElementById("typ").value;
	var priority = document.getElementById("priority").value;


	var xhttp = new XMLHttpRequest();
	var url = "bugme.php";

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState === xhttp.DONE) {
				if (xhttp.status === 200) {
					var response = xhttp.responseText;
					document.getElementById("container").innerHTML=response;
				} else {
					alert('There was a problem with the request.');
				}
		} 
		}
		xhttp.open("GET", url+"?request="+request+"&title="+title+"&desc="+desc+"&ass="+ass+"&type="+typ+"&priority="+priority+"&user="+x,true);
		xhttp.send();
}

function createUser(x){
	//alert("I work");

	var request = "createUser";
	
	var fname = document.getElementById("Firstname").value;
	var lname = document.getElementById("Lastname").value;
	var password = document.getElementById("Password").value;
	var email = document.getElementById("Email").value;

	var xhttp = new XMLHttpRequest();
	var url = "bugme.php";

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState === xhttp.DONE) {
				if (xhttp.status === 200) {
					var response = xhttp.responseText;
					document.getElementById("container").innerHTML=response;
				} else {
					alert('There was a problem with the request.');
				}
		} 
		}
		xhttp.open("GET", url+"?request="+request+"&fname="+fname+"&lname="+lname+"&password="+password+"&email="+email,true);
		xhttp.send();
}

function Filter(x,y){
	//alert("I work");
	console.log(x,y);
	
	var request = "filter";

	var xhttp = new XMLHttpRequest();
	var url = "bugme.php";

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState === xhttp.DONE) {
				if (xhttp.status === 200) {
					var response = xhttp.responseText;
					document.getElementById("container").innerHTML=response;
				} else {
					alert('There was a problem with the request.');
				}
		} 
		}
		xhttp.open("GET", url+"?request="+request+"&filter="+x+"&user="+y,true);
		xhttp.send();
}


/*window.onload = function (){
	var usrDetails = document.getElementById("submitBtn").addEventListener("click", addUser);
	var exitReq = document.getElementById("Logout").addEventListener("click",Logout);

	function addUser() {

		var fname = document.getElementById("Firstname").value;
		var lname = document.getElementById("Lastname").value;
		var password = document.getElementById("Password").value;
		var email = document.getElementById("Email").value;

		console.log(fname);
		console.log(lname);
		console.log(password);
		console.log(email);

		var user = JSON.stringify([fname,lname,password,email]);

		var httpRequest = new XMLHttpRequest();
		var url = "bugme.php";

		httpRequest.onreadystatechange = function (){
			console.log("I work")
			if (httpRequest.readyState === XMLHttpRequest.DONE) {
			 	if (httpRequest.status === 200) {
			 		var response = httpRequest.responseText;
			 		document.getElementById("box2").innerHTML="";
		 			document.getElementById("box2").innerHTML=response;

			 	} else {
			 		alert('There was a problem with the request.');
			 	}
			}
		};
		console.log(user);
		httpRequest.open('POST', url);
		httpRequest.send(user);		
	}	

}*/