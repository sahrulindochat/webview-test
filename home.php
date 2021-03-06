<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Home Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div style="padding: 10px;width: 100vw;">
				<h1>Homepage</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<p style="padding: 15px;width: 96vw;">Welcome back, <?=$_SESSION['name']?>!</p>
			<div style="padding: 15px;width: 96vw;">
				<div>
					<h3 style="margin-top: 0px;margin-bottom: 5px;">Message</h3>
				</div>
				<div>
					<input style="margin-bottom: 15px;width: 89vw;height: 100px;padding: 0 5px 70px;" name="message" id="message" />
				</div>
				<input type="button" value="Send Message" onclick="postData()">
			</div>
		</div>
	</body>
</html>
<script>
document.addEventListener("message", function(result) {
	let resultData = JSON.parse(result.data);
	if(resultData.type == 'message'){
		document.getElementById("message").value = resultData.message;
	}
})

function postData(){
	let message = document.getElementById("message").value;
	window.postMessage(message);
	window.ReactNativeWebView.postMessage(message);
	// alert(message);
}
</script>