<?php
	session_start();
	include 'connection.php';
	
	$query = "TRUNCATE TABLE announcement";
	$result = mysqli_query($conn, $query);
	
	header("Location: editAnnouncement.php");
	
?>