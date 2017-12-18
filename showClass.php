<?php
	session_start();
	include 'connection.php';
	
	if(isset($_POST["classID"])){
		
		$query = "SELECT * FROM class WHERE ID = '".$_POST["classID"]."'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);
		
		echo json_encode($row);
		
		
		
	}
?>