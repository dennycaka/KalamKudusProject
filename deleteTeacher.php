<?php
	session_start();
	include 'connection.php';
	
	if($_POST['teacherID']) {
		
		$output = '';
		$query = "DELETE FROM teachers WHERE ID='".$_POST['teacherID']."'";
		
		mysqli_query($conn, $query);
	
	}

?>