<?php
	session_start();
	include 'connection.php';

	if (!empty($_POST)){
		if($_POST["messageID"] != ''){ 
			$id = mysqli_real_escape_string($conn, $_POST["messageID"]); 
			$replyMessage = mysqli_real_escape_string($conn, $_POST["replyMessage"]); 
			$query = "UPDATE message SET replyMessage ='$replyMessage' WHERE ID = '$id'";
			$result = mysqli_query($conn, $query);
			
			header("Location: messages.php");
		}
		else{
			$about = mysqli_real_escape_string($conn, $_POST["about"]);
			$message = mysqli_real_escape_string($conn, $_POST["message"]);
			$dateSent = mysqli_real_escape_string($conn, $_POST["dateS"]);
			$sender = mysqli_real_escape_string($conn, $_POST["sender"]);
			$query = "INSERT INTO message(About, Message, dateSent, Sender)VALUES('$about','$message','$dateSent','$sender')";
			$result = mysqli_query($conn, $query);
			
			echo "<script>alert('Message has been sent!');location.href='studentWriteMessage.php';</script>";
		}
	}
?>