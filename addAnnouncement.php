<?php
	session_start();
	include 'connection.php';

	if (!empty($_POST)){
		$title = mysqli_real_escape_string($conn, $_POST["title"]);
		$notif = mysqli_real_escape_string($conn, $_POST["announcement"]);
		$datePosted = mysqli_real_escape_string($conn, $_POST["dateP"]);
		$query = "INSERT INTO announcement(Title, Messages, datePosted)VALUES('$title','$notif','$datePosted')";
		$result = mysqli_query($conn, $query);
		
		header("Location: editAnnouncement.php");
	
	}
?>