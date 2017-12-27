<?php
	session_start();
	include 'connection.php';
	
	if(!empty($_POST)){
		
		$name = mysqli_real_escape_string($conn, $_POST["name"]); 
		$grade = mysqli_real_escape_string($conn, $_POST["attendanceID"]);
		$absence = mysqli_real_escape_string($conn, $_POST["absence"]); 
		$month = mysqli_real_escape_string($conn, $_POST["month"]); 
		$new_attendance = mysqli_real_escape_string($conn, $_POST["new_attendance"]); 
		
		$query2 = "SELECT * FROM class WHERE ID='$grade'";
		$result2 = mysqli_query($conn, $query2);
		$row2 = mysqli_fetch_array($result2);
				
		$gradeName = $row2["Name"];
		
		$query2b = "SELECT * FROM students WHERE Name='$name'";
		$result2b = mysqli_query($conn, $query2b);
		$row2b = mysqli_fetch_array($result2b); 
		
		$id = $row2b["ID"];
		
		if($absence=="sick"){
			$query3 = "UPDATE attendance$gradeName SET Illness='$new_attendance' WHERE studentID='$id' AND studentName='$name' AND Month='$month'";			
			$result3 = mysqli_query($conn, $query3);
		}
		else if($absence=="trip"){
			$query3 = "UPDATE attendance$gradeName SET Vacation='$new_attendance' WHERE studentID='$id' AND studentName='$name' AND Month='$month'";			
			$result3 = mysqli_query($conn, $query3);
		}
		else if($absence=="ber"){
			$query3 = "UPDATE attendance$gradeName SET Bereavement='$new_attendance' WHERE studentID='$id' AND studentName='$name' AND Month='$month'";			
			$result3 = mysqli_query($conn, $query3);
		}
		else if($absence=="unver"){
			$query3 = "UPDATE attendance$gradeName SET Unverified='$new_attendance' WHERE studentID='$id' AND studentName='$name' AND Month='$month'";			
			$result3 = mysqli_query($conn, $query3);
		}
		else{
			$query3 = "UPDATE attendance$gradeName SET Lateness='$new_attendance' WHERE studentID='$id' AND studentName='$name' AND Month='$month'";			
			$result3 = mysqli_query($conn, $query3);
		}
	}