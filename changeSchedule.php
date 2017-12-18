<?php
	session_start();
	include 'connection.php';
	if(!empty($_POST)){
		$grade = mysqli_real_escape_string($conn, $_POST["class"]); 
		$day = mysqli_real_escape_string($conn, $_POST["day"]); 
		$period = mysqli_real_escape_string($conn, $_POST["period"]); 
		$subject = mysqli_real_escape_string($conn, $_POST["subject"]); 
		
		
		if($period=="p1"){
			$query2 = "UPDATE schedule$grade SET `Period 1`='$subject' WHERE Day='$day'";
			$result2 = mysqli_query($conn, $query2);
		}
		else if($period=="p2"){
			$query2 = "UPDATE schedule$grade SET `Period 2`='$subject' WHERE Day='$day'";
			$result2 = mysqli_query($conn, $query2);
		}
		else if($period=="p3"){
			$query2 = "UPDATE schedule$grade SET `Period 3`='$subject' WHERE Day='$day'";
			$result2 = mysqli_query($conn, $query2);
		}
		else if($period=="p4"){
			$query2 = "UPDATE schedule$grade SET `Period 4`='$subject' WHERE Day='$day'";
			$result2 = mysqli_query($conn, $query2);
		}
		else{
			$query2 = "UPDATE schedule$grade SET `Period 5`='$subject' WHERE Day='$day'";
			$result2 = mysqli_query($conn, $query2);
		}
		
		header("Location: editClass.php");
	
	}
?>