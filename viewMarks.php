<?php  
	session_start();
	include 'connection.php';

 if(isset($_POST["marks_id"]))  
 {  
	  $output = '';    
      $query = "SELECT Name FROM class WHERE ID = '".$_POST["marks_id"]."'";  
      $result = mysqli_query($conn, $query);  
	  $row = mysqli_fetch_array($result);
	
	  $name = $row["Name"];
	   
	  $query2 = "SHOW TABLES FROM loginsystem LIKE '%marks$name%'";
	  $result2 = mysqli_query($conn,$query2);
	  $row2 = mysqli_fetch_array($result2);
	  
	  if($row2==false){	  
		$querycreate ="CREATE TABLE marks$name (ID INT(10) PRIMARY KEY AUTO_INCREMENT, studentID INT(20), studentName VARCHAR(100), subject VARCHAR(20),
		assignment1 DOUBLE, assignment2 DOUBLE, test1 DOUBLE, test2 DOUBLE, test3 DOUBLE, finalExam DOUBLE)";
		$resultcreate = mysqli_query($conn,$querycreate);
	  }
	  
	  $query2b = "SHOW TABLES FROM loginsystem LIKE '%marks$name%'";
	  $result2b = mysqli_query($conn,$query2b);
	  $row2b = mysqli_fetch_array($result2b);
	  
	  if($row2==false){
		$row2[0] = $row2b[0];
	  }
	  

	  $query3 = "SELECT * FROM $row2[0] ORDER BY Subject ASC";
	  $result3 = mysqli_query($conn,$query3);
	    
      $output .= '  
	  <input id="myInput" type="text" class="form-control col-3" placeholder="Search name or subject.."/>
	  <br/>
	  
      <div class="table-responsive">  
           <table id="myTable" class="table table-bordered">
		   <thead>
				<tr>
					<th width="10%">Student ID</th>
					<th width="10%">Student Name</th>
					<th width="10%">Subject</th>
					<th width="10%">Assignment 1</th>
					<th width="10%">Assignment 2</th>
					<th width="10%">Test 1</th>
					<th width="10%">Test 2</th>
					<th width="10%">Test 3</th>
					<th width="10%">Final Exam</th>
				</tr>
			</thead>
			<tbody>
			';
				
      while($row3 = mysqli_fetch_array($result3))  
      {  
           $output .= '  
				
					<tr>  
						<td width="10%">'.$row3["studentID"].'</td>
						<td width="10%">'.$row3["studentName"].'</td>
						<td width="10%">'.$row3["subject"].'</td>
						<td width="10%">'.$row3["assignment1"].'</td>
						<td width="10%">'.$row3["assignment2"].'</td>
						<td width="10%">'.$row3["test1"].'</td>
						<td width="10%">'.$row3["test2"].'</td>
						<td width="10%">'.$row3["test3"].'</td>
						<td width="10%">'.$row3["finalExam"].'</td>
						
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
 

