<?php
	session_start();
	include 'connection.php';
	
	if($_POST['studentID']) {
		
		
		$query = "DELETE FROM students WHERE ID='".$_POST['studentID']."'";
		
		mysqli_query($conn, $query);
	
	}

?>