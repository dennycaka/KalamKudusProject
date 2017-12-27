<?php
	session_start();
	include 'connection.php';
	
	if(!empty($_POST)){
		
		$name = mysqli_real_escape_string($conn, $_POST["name"]);
		$grade = mysqli_real_escape_string($conn, $_POST["attendanceID"]); 		
		$month = mysqli_real_escape_string($conn, $_POST["month"]); 
		$sick = mysqli_real_escape_string($conn, $_POST["sick"]); 
		$trip = mysqli_real_escape_string($conn, $_POST["trip"]); 
		$ber = mysqli_real_escape_string($conn, $_POST["ber"]); 
		$unver = mysqli_real_escape_string($conn, $_POST["unverified"]); 
		$late = mysqli_real_escape_string($conn, $_POST["late"]); 
		
		$query2 = "SELECT * FROM class WHERE ID='$grade'";
		$result2 = mysqli_query($conn, $query2);
		$row2 = mysqli_fetch_array($result2);
				
		$gradeName = $row2["Name"];
		
		$query2b = "SELECT * FROM students WHERE Name='$name'";
		$result2b = mysqli_query($conn, $query2b);
		$row2b = mysqli_fetch_array($result2b); 
		
		$id = $row2b["ID"];
				
		
		$query3 = "INSERT INTO attendance$gradeName(studentID, studentName, Month, Illness, Vacation, Bereavement, Unverified, Lateness)
		VALUES('$id','$name','$month','$sick','$trip','$ber','$unver','$late')";			
		
		$result3 = mysqli_query($conn, $query3);
		
	}
?>