<?php  
	session_start();
	include 'connection.php';

 if(isset($_POST["attendance_id"]))  
 {  
	  $output = '';    
      $query = "SELECT Name FROM class WHERE ID = '".$_POST["attendance_id"]."'";  
      $result = mysqli_query($conn, $query);  
	  $row = mysqli_fetch_array($result);
	
	  $name = $row["Name"];
	   
	  $query2 = "SHOW TABLES FROM loginsystem LIKE '%attendance$name%'";
	  $result2 = mysqli_query($conn,$query2);
	  $row2 = mysqli_fetch_array($result2);
	  
	  if($row2==false){	  
		$querycreate ="CREATE TABLE attendance$name (Number INT(10) PRIMARY KEY AUTO_INCREMENT, studentID INT(20), studentName VARCHAR(100), Month VARCHAR(20),
		Illness INT(10), Vacation INT(10), Bereavement INT(10), Unverified INT(10), Lateness INT(10))";
		$resultcreate = mysqli_query($conn,$querycreate);
	  }
	  
	  $query2b = "SHOW TABLES FROM loginsystem LIKE '%attendance$name%'";
	  $result2b = mysqli_query($conn,$query2b);
	  $row2b = mysqli_fetch_array($result2b);
	  
	  if($row2==false){
		$row2[0] = $row2b[0];
	  }
	  

	  $query3 = "SELECT * FROM $row2[0] ORDER BY studentID ASC";
	  $result3 = mysqli_query($conn,$query3);
	    
      $output .= '  
	  <input id="myInput" type="text" class="form-control col-3" placeholder="Search name or month.."/>
	  <br/>
	  
      <div class="table-responsive">  
           <table id="myTable" class="table table-bordered">
		   <thead>
				<tr>
					<th width="10%">Student ID</th>
					<th width="15%">Student Name</th>
					<th width="10%">Month</th>
					<th width="10%">Illness</th>
					<th width="10%">Vacation</th>
					<th width="10%">Bereavement</th>
					<th width="10%">Unverified</th>
					<th width="10%">Lateness</th>
				</tr>
			</thead>
			<tbody>
			';
				
      while($row3 = mysqli_fetch_array($result3))  
      {  
           $output .= '  
				
					<tr>  
						<td width="10%">'.$row3["studentID"].'</td>
						<td width="15%">'.$row3["studentName"].'</td>
						<td width="10%">'.$row3["Month"].'</td>
						<td width="10%">'.$row3["Illness"].'</td>
						<td width="10%">'.$row3["Vacation"].'</td>
						<td width="10%">'.$row3["Bereavement"].'</td>
						<td width="10%">'.$row3["Unverified"].'</td>
						<td width="10%">'.$row3["Lateness"].'</td>
					</tr>
				
             
                ';  
      }  
      $output .= "</tbody></table></div>";  
      echo $output;  
	  
 }  


?>

<script>

function filterTable(event) {
    var filter = event.target.value.toUpperCase();
    var rows = document.querySelector("#myTable tbody").rows;
    
    for (var i = 0; i < rows.length; i++) {
        var firstCol = rows[i].cells[1].textContent.toUpperCase();
        var secondCol = rows[i].cells[2].textContent.toUpperCase();
        if (firstCol.indexOf(filter) > -1 || secondCol.indexOf(filter) > -1) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }      
    }
}

document.querySelector('#myInput').addEventListener('keyup', filterTable, false);

</script>
 

