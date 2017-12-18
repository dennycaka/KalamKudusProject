<?php  
	session_start();
	include 'connection.php';
	
 if(isset($_POST["student_id"]))  
 {  
      $output = '';    
      $query = "SELECT * FROM students WHERE ID = '".$_POST["student_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="40%"><label>Student ID</label></td>  
                     <td width="60%">'.$row["ID"].'</td>  
                </tr>  
                <tr>  
                     <td width="40%"><label>Name</label></td>  
                     <td width="60%">'.$row["Name"].'</td>  
                </tr>
				 <tr>  
                     <td width="40%"><label>Date of Birth</label></td>  
                     <td width="60%">'.$row["dateOfBirth"].'</td>  
                </tr> 
				<tr>  
                     <td width="40%"><label>Religion</label></td>  
                     <td width="60%">'.$row["Religion"].'</td>  
                </tr>
				<tr>  
                     <td width="40%"><label>Address</label></td>  
                     <td width="60%">'.$row["Address"].'</td>  
                </tr> 
				 <tr>  
                     <td width="40%"><label>Phone Number</label></td>  
                     <td width="60%">'.$row["phoneNumber"].'</td>  
                </tr> 
				 <tr>  
                     <td width="40%"><label>Guardian Name</label></td>  
                     <td width="60%">'.$row["guardianName"].'</td>  
                </tr> 
				 <tr>  
                     <td width="40%"><label>Guardian Address</label></td>  
                     <td width="60%">'.$row["guardianAddress"].'</td>  
                </tr> 
				 <tr>  
                     <td width="40%"><label>Guardian Phone Number</label></td>  
                     <td width="60%">'.$row["guardianPhoneNumber"].'</td>  
                </tr> 
				 <tr>  
                     <td width="40%"><label>Guardian Status</label></td>  
                     <td width="60%">'.$row["guardianStatus"].'</td>  
                </tr> 
              
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>
