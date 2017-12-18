<?php
	session_start();
	include 'connection.php';
	
	$query = "SELECT * FROM message WHERE ID = '$_POST[message_id]'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result);
	
	echo json_encode($row);
		
		
		
	
?>