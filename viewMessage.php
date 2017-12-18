<?php  
	session_start();
	include 'connection.php';
	
 if(isset($_POST["message_id"]))  
 {  
      $output = '';    
      $query = "SELECT * FROM message WHERE ID = '".$_POST["message_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>   
                    <td width="40%"><label>Date Sent</label></td>  
					<td width="60%">'.$row["dateSent"].'</td>  
                </tr> 
					<td width="40%"><label>Message</label></td>
                    <td width="60%">'.$row["Message"].'</td>  
                </tr> 
				<tr>
					<td width="40%"><label>Reply Message</label></td>
                    <td width="60%">'.$row["replyMessage"].'</td>  
                </tr> 
              
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>
