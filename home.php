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
			<div>
				<h1>Website Title</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Home Page</h2>
			<p>Welcome back, <?=$_SESSION['name']?>!</p>

			<div id="login">
				<form id="formLogin" action="authenticate.php" method="post">
					<div class="form-control">
						<h3 style="margin-top: 0px;margin-bottom: 5px;">Message</h3>
					</div>
					<div class="form-control">
						<textarea style="margin-bottom: 15px;width: 100%;" name="message" id="message" cols="30" rows="5"></textarea>
					</div>
					<input type="button" value="Send Message">
				</form>
			</div>
		</div>
	</body>
</html>
<script>
window.addEventListener("message", message => {
  alert(message.data) // Wayne is coming!!!
});
</script>