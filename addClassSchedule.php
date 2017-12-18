<?php
	session_start();
	include 'connection.php';
	
	if(!empty($_POST)){
		
		$output = '';
		$grade = mysqli_real_escape_string($conn, $_POST["grade2"]); 
		
		$monday1 = mysqli_real_escape_string($conn, $_POST["mon1"]);  
		$monday2 = mysqli_real_escape_string($conn, $_POST["mon2"]); 
		$monday3 = mysqli_real_escape_string($conn, $_POST["mon3"]); 
		$monday4 = mysqli_real_escape_string($conn, $_POST["mon4"]); 
		$monday5 = mysqli_real_escape_string($conn, $_POST["mon5"]); 
		
		$tuesday1 = mysqli_real_escape_string($conn, $_POST["tue1"]); 
		$tuesday2 = mysqli_real_escape_string($conn, $_POST["tue2"]); 
		$tuesday3 = mysqli_real_escape_string($conn, $_POST["tue3"]); 
		$tuesday4 = mysqli_real_escape_string($conn, $_POST["tue4"]); 
		$tuesday5 = mysqli_real_escape_string($conn, $_POST["tue5"]); 
		
		
		$wednesday1 = mysqli_real_escape_string($conn, $_POST["wed1"]); 
		$wednesday2 = mysqli_real_escape_string($conn, $_POST["wed2"]); 
		$wednesday3 = mysqli_real_escape_string($conn, $_POST["wed3"]); 
		$wednesday4 = mysqli_real_escape_string($conn, $_POST["wed4"]); 
		$wednesday5 = mysqli_real_escape_string($conn, $_POST["wed5"]); 
		
		
		$thursday1 = mysqli_real_escape_string($conn, $_POST["thu1"]); 
		$thursday2 = mysqli_real_escape_string($conn, $_POST["thu2"]); 
		$thursday3 = mysqli_real_escape_string($conn, $_POST["thu3"]); 
		$thursday4 = mysqli_real_escape_string($conn, $_POST["thu4"]); 
		$thursday5 = mysqli_real_escape_string($conn, $_POST["thu5"]); 
		
		$friday1 = mysqli_real_escape_string($conn, $_POST["fri1"]); 
		$friday2 = mysqli_real_escape_string($conn, $_POST["fri2"]); 
		$friday3 = mysqli_real_escape_string($conn, $_POST["fri3"]); 
		$friday4 = mysqli_real_escape_string($conn, $_POST["fri4"]); 
		$friday5 = mysqli_real_escape_string($conn, $_POST["fri5"]); 
		
		/*		
		if($_POST["adminID"] != ''){  
           $query = "UPDATE admin SET name='$name' WHERE id='".$_POST["adminID"]."'";   
		}  */
		
		//else{  
			$query = "INSERT INTO schedule$grade(Day,`period 1`,`period 2`,`period 3`,`period 4`,`period 5`)
			VALUES('Monday','$monday1','$monday2','$monday3','$monday4','$monday5')";
			
			$query2 = "INSERT INTO schedule$grade(Day,`period 1`,`period 2`,`period 3`,`period 4`,`period 5`)
			VALUES('Tuesday','$tuesday1','$tuesday2','$tuesday3','$tuesday4','$tuesday5')";
			
			$query3 = "INSERT INTO schedule$grade(Day,`period 1`,`period 2`,`period 3`,`period 4`,`period 5`)
			VALUES('Wednesday','$wednesday1','$wednesday2','$wednesday3','$wednesday4','$wednesday5')";
			
			$query4 = "INSERT INTO schedule$grade(Day,`period 1`,`period 2`,`period 3`,`period 4`,`period 5`)
			VALUES('Thursday','$thursday1','$thursday2','$thursday3','$thursday4','$thursday5')";
			
			$query5 = "INSERT INTO schedule$grade(Day,`period 1`,`period 2`,`period 3`,`period 4`,`period 5`)
			VALUES('Friday','$friday1','$friday2','$friday3','$friday4','$friday5')";
			
			$result = mysqli_query($conn,$query);
			mysqli_query($conn,$query2);
			mysqli_query($conn,$query3);
			mysqli_query($conn,$query4);
			mysqli_query($conn,$query5);
		//}
				
		if($result){
			
			$select_query = "SELECT * FROM class ORDER BY Name ASC";
			$result = mysqli_query($conn, $select_query);
			$output .= '
			<table class="table table-bordered">  
				<tr>  
					<th width="25%">Class</th>
					<th width = "15%">Edit Schedule</th>
					<th width = "15%">View Schedule</th>
					<th width = "15%">Add Student</th>
					<th width = "15%">Delete Student</th>
					<th width = "25%">Delete Class</th>
				</tr>

			';
			while($row = mysqli_fetch_array($result)){
				$output .= '
					<tr>  
						<td>Grade <?php echo $row["Name"];?></td>
						<td><input type="button" name="view" value="Edit Schedule" id="'.$row["ID"].'" class="edit_data btn btn-primary"/></td>
						<td><input type="button" name="view" value="View Schedule" id="'.$row["ID"].'" class="view_data btn btn-primary"/></td>
						<td><input type="button" name="view" value="Add Student" id="'.$row["ID"].'" class="add_data btn btn-primary"/></td>
						<td><input type="button" name="view" value="Delete Student" id="'.$row["ID"].'" class="add_data btn btn-primary"/></td>
						<td><input type="button" name="view" value="Delete Class" id="'.$row["ID"].'" class="add_data btn btn-primary"/></td>
					</tr>
				';
			}
			$output .= '</table>';
		}
		echo $output;
	}
?>