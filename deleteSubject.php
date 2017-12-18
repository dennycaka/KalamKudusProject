<?php
	session_start();
	include 'connection.php';
		
	if(!empty($_POST['deletedSubject'])) {
		
		$name = $_POST['deletedSubject'];
		
		$query = "DELETE FROM subjects WHERE Name='$name'";
		$result = mysqli_query($conn, $query);
		
		header("Location: editMarks.php");
		
	}
?>