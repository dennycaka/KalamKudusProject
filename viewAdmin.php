<?php  
	session_start();
	include 'connection.php';
	
 if(isset($_POST["admin_id"]))  
 {  
      $output = '';    
      $query = "SELECT * FROM admin WHERE ID = '".$_POST["admin_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="40%"><label>Administrator ID</label></td>  
                     <td width="60%">'.$row["ID"].'</td>  
                </tr>  
                <tr>  
                     <td width="40%"><label>Name</label></td>  
                     <td width="60%">'.$row["Name"].'</td>  
                </tr>  
              
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>
