<?php
	session_start();
	include 'connection.php';
	
	if(!empty($_POST)){
		
		$output = '';
		$name = mysqli_real_escape_string($conn, $_POST["name"]);  
			
		if($_POST["classID"] != ''){  
           $query = "UPDATE class SET Name='$name' WHERE ID='".$_POST["classID"]."'";   
		}  
		else{  
			$query = "INSERT INTO class(Name)VALUES('$name')";
		}
		
		if(mysqli_query($conn, $query)){
			
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