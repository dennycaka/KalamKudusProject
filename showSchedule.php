<?php
	session_start();
	include 'connection.php';
	
	if(isset($_POST["classID"])){
		
	  $query = "SELECT Name FROM class WHERE ID = '".$_POST["classID"]."'";  
      $result = mysqli_query($conn, $query);  
	  $row = mysqli_fetch_array($result);
	
	  $name = $row["Name"];
	   
	  $query2 = "SHOW TABLES FROM loginsystem LIKE '%schedule$name%'";
	  $result2 = mysqli_query($conn,$query2);
	  $row2 = mysqli_fetch_array($result2);
		
	  echo json_encode($row2);
		
		
		
	}
?>