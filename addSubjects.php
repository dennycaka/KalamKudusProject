<?php
	session_start();
	include 'connection.php';
	
	if(!empty($_POST)){
		
		$output = '';
		$name = mysqli_real_escape_string($conn, $_POST["subjectName"]);  
	
		$query = "INSERT INTO subjects(Name)VALUES('$name')";
		
		
		mysqli_query($conn, $query);
			
			
	}
?>