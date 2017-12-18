<?php
	include 'connection.php';
	session_start();	
	
	if ($_POST["name"]){
		$name = $_POST["name"];
		$id = $_POST["studentID"];
		
		$query = "UPDATE students SET Name='$name' WHERE ID='$id'";
		$result = mysqli_query($conn, $query);
		
		
	}
	if ($_POST["bday"]){
		$bday = $_POST["bday"];
		$id = $_POST["studentID"];
		
		$query = "UPDATE students SET dateOfBirth='$bday' WHERE ID='$id'";
		$result = mysqli_query($conn, $query);
		
		
	}
	if ($_POST["address"]){
		$address = $_POST["address"];
		$id = $_POST["studentID"];
		
		$query = "UPDATE students SET Address='$address' WHERE ID='$id'";
		$result = mysqli_query($conn, $query);
		
		
	}
	if ($_POST["pnum"]){
		$pnum = $_POST["pnum"];
		$id = $_POST["studentID"];
		
		$query = "UPDATE students SET phoneNumber='$pnum' WHERE ID='$id'";
		$result = mysqli_query($conn, $query);
		
		
	}
	if ($_POST["name_g"]){
		$gName = $_POST["name_g"];
		$id = $_POST["studentID"];
		
		$query = "UPDATE students SET guardianName='$gName' WHERE ID='$id'";
		$result = mysqli_query($conn, $query);
		
		
	}
	if ($_POST["address_g"]){
		$gAddress = $_POST["address_g"];
		$id = $_POST["studentID"];
		
		$query = "UPDATE students SET guardianAddress='$gAddress' WHERE ID='$id'";
		$result = mysqli_query($conn, $query);
		
		
	}
	if ($_POST["pnum_g"]){
		$gPnum = $_POST["pnum_g"];
		$id = $_POST["studentID"];
		
		$query = "UPDATE students SET guardianPhoneNumber='$gPnum' WHERE ID='$id'";
		$result = mysqli_query($conn, $query);
		
		
	}
	if ($_POST["status"]){
		$status = $_POST["status"];
		$id = $_POST["studentID"];
		
		$query = "UPDATE students SET guardianStatus='$status' WHERE ID='$id'";
		$result = mysqli_query($conn, $query);
		
		
	}
	header("Location: studentProfile.php");
?>