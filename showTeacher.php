<?php
	session_start();
	include 'connection.php';
	
	if(isset($_POST["teacherID"])){
		
		$query = "SELECT * FROM teachers WHERE ID = '".$_POST["teacherID"]."'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);
		
		echo json_encode($row);
		
		
		
	}
?>