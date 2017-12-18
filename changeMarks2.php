<?php
	session_start();
	include 'connection.php';
	
	if(!empty($_POST)){
		
		$name = mysqli_real_escape_string($conn, $_POST["name"]); 
		$grade = mysqli_real_escape_string($conn, $_POST["marksID"]); 
		$assessment = mysqli_real_escape_string($conn, $_POST["assessment"]); 
		$subject = mysqli_real_escape_string($conn, $_POST["subject"]); 
		$new_mark = mysqli_real_escape_string($conn, $_POST["new_mark"]); 
		
		$query2 = "SELECT * FROM class WHERE ID='$grade'";
		$result2 = mysqli_query($conn, $query2);
		$row2 = mysqli_fetch_array($result2);
				
		$gradeName = $row2["Name"];
		
		$query2b = "SELECT * FROM students WHERE Name='$name'";
		$result2b = mysqli_query($conn, $query2b);
		$row2b = mysqli_fetch_array($result2b); 
		
		$id = $row2b["ID"];
		
		if($assessment=="ass1"){
			$query3 = "UPDATE marks$gradeName SET assignment1='$new_mark' WHERE studentID='$id' AND studentName='$name' AND subject='$subject'";			
			$result3 = mysqli_query($conn, $query3);
		}
		else if($assessment=="ass2"){
			$query3 = "UPDATE marks$gradeName SET assignment2='$new_mark' WHERE studentID='$id' AND studentName='$name' AND subject='$subject'";			
			$result3 = mysqli_query($conn, $query3);
		}
		else if($assessment=="test1"){
			$query3 = "UPDATE marks$gradeName SET test1='$new_mark' WHERE studentID='$id' AND studentName='$name' AND subject='$subject'";			
			$result3 = mysqli_query($conn, $query3);
		}
		else if($assessment=="test2"){
			$query3 = "UPDATE marks$gradeName SET test2='$new_mark' WHERE studentID='$id' AND studentName='$name' AND subject='$subject'";			
			$result3 = mysqli_query($conn, $query3);
		}
		else if($assessment=="test3"){
			$query3 = "UPDATE marks$gradeName SET test3='$new_mark' WHERE studentID='$id' AND studentName='$name' AND subject='$subject'";			
			$result3 = mysqli_query($conn, $query3);
		}
		else{
			$query3 = "UPDATE marks$gradeName SET finalExam='$new_mark' WHERE studentID='$id' AND studentName='$name' AND subject='$subject'";			
			$result3 = mysqli_query($conn, $query3);
		}
	}