<?php
	session_start();
	include 'connection.php';
	
	if(isset($_POST["adminID"])){
		
		$query = "SELECT * FROM admin WHERE ID = '".$_POST["adminID"]."'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);
		
		echo json_encode($row);
		
		
		
	}
?>