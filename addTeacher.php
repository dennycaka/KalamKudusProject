<?php
	session_start();
	include 'connection.php';
	
	if(!empty($_POST)){
		
		$output = '';
		$name = mysqli_real_escape_string($conn, $_POST["name"]); 
		$dob = mysqli_real_escape_string($conn, $_POST["bday"]); 
		$religion = mysqli_real_escape_string($conn, $_POST["religion"]); 
		$address = mysqli_real_escape_string($conn, $_POST["address"]); 
		$phonenumber = mysqli_real_escape_string($conn, $_POST["phonenumber"]); 
		$subject = mysqli_real_escape_string($conn, $_POST["subject"]); 
				
		if($_POST["teacherID"] != ''){  
           $query = "UPDATE teachers 
		   SET Name='$name',
		   dateOfBirth= '$dob',
		    Religion = '$religion',
		   Address= '$address',
		   phoneNumber= '$phonenumber',
		   subject='$subject'
		   
		   WHERE ID='".$_POST["teacherID"]."'";   
		}  
		else{  
			$query = "INSERT INTO teachers(Name,dateOfBirth,Religion,Address,phoneNumber,subject)
			VALUES('$name', '$dob', '$religion', '$address', '$phonenumber', '$subject')";
		}
		mysqli_query($conn, $query);
		
	}
?>