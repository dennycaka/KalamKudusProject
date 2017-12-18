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
		$guardian_name = mysqli_real_escape_string($conn, $_POST["guardian_name"]); 
		$guardian_address = mysqli_real_escape_string($conn, $_POST["guardian_address"]); 
		$guardian_phonenumber = mysqli_real_escape_string($conn, $_POST["guardian_phonenumber"]); 
		$guardian_status = mysqli_real_escape_string($conn, $_POST["guardian_status"]); 
				
		if($_POST["studentID"] != ''){  
           $query = "UPDATE students 
		   SET Name='$name',
		   dateOfBirth= '$dob',
		   Religion = '$religion',
		   Address= '$address',
		   phoneNumber= '$phonenumber',
		   guardianName= '$guardian_name',
		   guardianAddress= '$guardian_address',
		   guardianPhoneNumber= '$guardian_phonenumber',
		   guardianStatus='$guardian_status'
		   
		   WHERE ID='".$_POST["studentID"]."'";   
		}  
		else{  
			$query = "INSERT INTO students(Name,dateOfBirth,Religion,Address,phoneNumber,guardianName,guardianAddress,guardianPhoneNumber,guardianStatus)
			VALUES('$name', '$dob', '$religion', '$address', '$phonenumber', '$guardian_name', '$guardian_address', '$guardian_phonenumber', '$guardian_status')";
		}
		
		
		mysqli_query($conn, $query);
			
	}
?>