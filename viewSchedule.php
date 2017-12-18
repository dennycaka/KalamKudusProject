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
	   
	  $query2 = "SHOW TABLES FROM loginsystem LIKE '%schedule$name%'";
	  $result2 = mysqli_query($conn,$query2);
	  $row2 = mysqli_fetch_array($result2);
	  
	  if($row2==false){	  
		$querycreate ="CREATE TABLE schedule$name (ID INT(10) PRIMARY KEY AUTO_INCREMENT, Day VARCHAR(20), `Period 1` VARCHAR(20), `Period 2` VARCHAR(20), `Period 3` VARCHAR(20), 
		`Period 4` VARCHAR(20), `Period 5` VARCHAR(20))";
		$resultcreate = mysqli_query($conn,$querycreate);
	  }
	  
	  $query2b = "SHOW TABLES FROM loginsystem LIKE '%schedule$name%'";
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
				<th width="12%">Day</th>
				<th width="12%">Period 1</th>
				<th width="12%">Period 2</th>
				<th width="12%">Period 3</th>
				<th width="12%">Period 4</th>
				<th width="12%">Period 5</th>
			</tr>';
				
      while($row3 = mysqli_fetch_array($result3))  
      {  
           $output .= '  
                <tr>  
					<td width="12%">'.$row3["Day"].'</td>
					<td width="12%">'.$row3["Period 1"].'</td>
					<td width="12%">'.$row3["Period 2"].'</td>
					<td width="12%">'.$row3["Period 3"].'</td>
					<td width="12%">'.$row3["Period 4"].'</td>
					<td width="12%">'.$row3["Period 5"].'</td>
					
                </tr>  
             
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
	  
 }  
 ?>

