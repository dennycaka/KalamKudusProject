<?php
	session_start();
	include 'connection.php';
	
	if(isset($_POST["studentID"])){
		
		$query = "SELECT * FROM students WHERE ID = '".$_POST["studentID"]."'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);
		
		echo json_encode($row);
		
		
		
	}
?>