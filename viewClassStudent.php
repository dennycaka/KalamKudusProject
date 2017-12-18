<?php  
	session_start();
	include 'connection.php';
	
 if(isset($_POST["schedule_id"]))  
 {  
      
	  $output = '';    
      $query = "SELECT Name FROM class WHERE ID = '".$_POST["schedule_id"]."'";  
      $result = mysqli_query($conn, $query);  
	  $row = mysqli_fetch_array($result);
	
	  $name = $row["Name"];
	   
	  $query2 = "SHOW TABLES FROM loginsystem LIKE '%class$name%'";
	  $result2 = mysqli_query($conn,$query2);
	  $row2 = mysqli_fetch_array($result2);
	  
	  
	  if($row2==false){	  
		$querycreate ="CREATE TABLE class$name (Number INT(10) PRIMARY KEY AUTO_INCREMENT, studentID INT(10))";
		$resultcreate = mysqli_query($conn,$querycreate);
	  }
	  
	  $query2b = "SHOW TABLES FROM loginsystem LIKE '%class$name%'";
	  $result2b = mysqli_query($conn,$query2b);
	  $row2b = mysqli_fetch_array($result2b);
	  
	  if($row2==false){
		$row2[0] = $row2b[0];
	  }

	  $query3 = "SELECT * FROM $row2[0]";
	  $result3 = mysqli_query($conn,$query3);
	  

	  
      $output .= '  
	  
      <div class="table-responsive">  
           <table class="table table-bordered">
		   
			<tr>
				<th width="5%">Number</th>
				<th width="25%">Student ID</th>
				<th width="70%">Student Name</th>
				
			</tr>';
				
      while($row3 = mysqli_fetch_array($result3))  
      {  	  
			$query4 = "SELECT * FROM students WHERE ID = '".$row3["studentID"]."'";
			$result4 = mysqli_query($conn,$query4);
			$row4 = mysqli_fetch_array($result4);
           
		   $output .= '  
                <tr>  
					<td width="5%">'.$row3["Number"].'</td>
					<td width="25%">'.$row3["studentID"].'</td>
					<td width="70%">'.$row4["Name"].'</td>
						
                </tr> ';
             
                  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>
