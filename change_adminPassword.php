<?php
	session_start();
	include 'connection.php';
	
	$password1 = md5(mysqli_real_escape_string($conn, $_POST['password']));
	$password2 = md5(mysqli_real_escape_string($conn, $_POST['password2']));
	$userID = mysqli_real_escape_string($conn, $_SESSION['uid']);
	
	if($_SESSION['pwd']==md5($_POST['oldpass'])){
		if ($password1 != $password2){
			echo "<script>alert('Your two passwords do not match!');location.href='editAdmin.php';</script>";
		}
		else{
			mysqli_query($conn, "UPDATE users SET password='$password1' WHERE adminID='$userID'");
			$_SESSION['pwd'] = $password1;
			header("Location: editAdmin.php");
		}
	}
	else{
		echo "<script>alert('Your old password is incorrect!');location.href='editAdmin.php';</script>";
	}
?>