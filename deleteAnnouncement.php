<?php
	session_start();
	include 'connection.php';
		
	if(!empty($_POST['announcementID'])) {
		
		$output = '';
		$query = "DELETE FROM announcement WHERE ID='".$_POST['announcementID']."'";
		
		mysqli_query($conn, $query);
	
	}

?>