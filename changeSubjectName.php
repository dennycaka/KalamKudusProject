<?php
	session_start();
	include 'connection.php';
	if($_POST['newSubject']) {
		$old = mysqli_real_escape_string($conn, $_POST['oldSubject']);
		$new = mysqli_real_escape_string($conn, $_POST['newSubject']);
		
		$query = "UPDATE subjects SET Name='$new' WHERE Name='$old'";
		$result = mysqli_query($conn, $query);
		
		header("Location: editMarks.php");
	}
	
?>