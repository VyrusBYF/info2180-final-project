function Login(){

	var request = "login"
	
	var xhttp = new XMLHttpRequest();
	var url = "bugme.php";

	var email = document.getElementById("Email").value;
	var password = document.getElementById("Password").value;

	console.log(email,password);

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

function addUser() {

	var fname = document.getElementById("Firstname").value;
	var lname = document.getElementById("Lastname").value;
	var password = document.getElementById("Password").value;
	var email = document.getElementById("Email").value;

	var httpRequest = new XMLHttpRequest();
	var url = "bugme.php";

	httpRequest.onreadystatechange = function (){
		//console.log("I work")
		if (httpRequest.readyState === XMLHttpRequest.DONE) {
		 	if (httpRequest.status === 200) {
		 		var response = httpRequest.responseText;
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

function newIssue(){
	//alert("I work");

	var request = "newIssue"
	
	var xhttp = new XMLHttpRequest();
	var url = "bugme.php";

	var email = document.getElementById("Email").value;
	var password = document.getElementById("Password").value;

	console.log(email,password);

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