<?php
	session_start();
	include 'connection.php';
		
	if(!empty($_POST['adminID'])) {
		
		$output = '';
		$query = "DELETE FROM admin WHERE ID='".$_POST['adminID']."'";
		
		mysqli_query($conn, $query);
	
	}

?>