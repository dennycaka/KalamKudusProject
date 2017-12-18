<?php  
	session_start();
	include 'connection.php';
	
 if(isset($_POST["announcement_id"]))  
 {  
      $output = '';    
      $query = "SELECT * FROM announcement WHERE ID = '".$_POST["announcement_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>   
					<td width="40%"><label>Date Posted</label></td>
                    <td width="60%">'.$row["datePosted"].'</td>  
                </tr> 
				<tr>
					<td width="40%"><label>Message</label></td>
                    <td width="60%">'.$row["Messages"].'</td>  
                </tr>  
              
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>
