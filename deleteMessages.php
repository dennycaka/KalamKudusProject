<?php
	session_start();
	include 'connection.php';
	
	if($_POST['messageID']) {
		
		
		$query = "DELETE FROM message WHERE ID='".$_POST['messageID']."'";
		
		mysqli_query($conn, $query);
	
	}

?>