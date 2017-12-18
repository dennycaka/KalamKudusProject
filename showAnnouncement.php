<?php
	session_start();
	include 'connection.php';
	
	$query = "SELECT * FROM announcement WHERE ID = '$_POST[announcement_id]'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result);
	
	echo json_encode($row);
		
		
		
	
?>