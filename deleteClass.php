<?php
	session_start();
	include 'connection.php';
		
	if(!empty($_POST['classID'])) {
		
		$query= "SELECT * FROM class WHERE ID='".$_POST['classID']."'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);
		$name = $row["Name"];
		
		$query2 = "TRUNCATE TABLE class$name";
		mysqli_query($conn,$query2);
		
		$query3 = "TRUNCATE TABLE schedule$name";
		mysqli_query($conn,$query3);
		
		$query3b = "TRUNCATE TABLE marks$name";
		mysqli_query($conn,$query3b);
		
		$query4 = "DELETE FROM class WHERE ID='".$_POST['classID']."'";
		mysqli_query($conn, $query4);
		
	}

?>