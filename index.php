<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="styles/login.css">
	</head>
	
	<body>
		<div class="loginBox">
			<img src="styles/image/logo2.png" class="user">
			<h2>Log In Here</h2>
			<form action="login.php" method="POST">
				<p>User ID</p>
				<input type="text" name="uid" placeholder="Enter user ID" required>
				<p>Password</p>
				<input type="password" name="pwd" placeholder="••••••••••" required>
				<input type="submit" name="" value="Sign In">
				<a href="#">Forget password?</a>
			</form>
		</div>
	</body>
</html>