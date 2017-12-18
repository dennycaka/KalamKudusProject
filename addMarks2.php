<?php
	session_start();
	include 'connection.php';
	
	if(!empty($_POST)){
		
		$name = mysqli_real_escape_string($conn, $_POST["name"]); 
		$grade = mysqli_real_escape_string($conn, $_POST["marksID"]); 
		$subject = mysqli_real_escape_string($conn, $_POST["subject"]); 
		$ass1 = mysqli_real_escape_string($conn, $_POST["ass1"]); 
		$ass2 = mysqli_real_escape_string($conn, $_POST["ass2"]); 
		$test1 = mysqli_real_escape_string($conn, $_POST["test1"]); 
		$test2 = mysqli_real_escape_string($conn, $_POST["test2"]); 
		$test3 = mysqli_real_escape_string($conn, $_POST["test3"]); 
		$finalExam = mysqli_real_escape_string($conn, $_POST["finalexam"]); 
		
		$query2 = "SELECT * FROM class WHERE ID='$grade'";
		$result2 = mysqli_query($conn, $query2);
		$row2 = mysqli_fetch_array($result2);
				
		$gradeName = $row2["Name"];
		
		$query2b = "SELECT * FROM students WHERE Name='$name'";
		$result2b = mysqli_query($conn, $query2b);
		$row2b = mysqli_fetch_array($result2b); 
		
		$id = $row2b["ID"];
				
		
		$query3 = "INSERT INTO marks$gradeName(studentID, studentName, subject, assignment1, assignment2, test1, test2, test3, finalExam)
		VALUES('$id','$name','$subject','$ass1','$ass2','$test1','$test2','$test3','$finalExam')";			
		
		$result3 = mysqli_query($conn, $query3);
		
	}
?>