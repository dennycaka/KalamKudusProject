<?php
	session_start();
	include 'connection.php';
	
	if(!empty($_POST)){
		
		$output = '';
		$name = mysqli_real_escape_string($conn, $_POST["name"]);  
				
		if($_POST["adminID"] != ''){  
           $query = "UPDATE admin SET name='$name' WHERE id='".$_POST["adminID"]."'";   
		}  
		else{  
			$query = "INSERT INTO admin(Name)VALUES('$name')";
		}
		
		if(mysqli_query($conn, $query)){
			
			$select_query = "SELECT * FROM admin ORDER BY ID DESC";
			$result = mysqli_query($conn, $select_query);
			$output .= '
			<table class="table table-bordered">  
				<tr>  
					<th width="55%">Administrator Name</th>  
					<th width="15%">Edit</th>
					<th width="15%">View</th>  
					<th width="15%">Delete</th> 
				</tr>

			';
			while($row = mysqli_fetch_array($result)){
				$output .= '
					<tr>  
						<td>' . $row["Name"] . '</td>  
						<td><input type="button" name="Edit" value="Edit" id="' . $row["ID"] . '" class="edit_data btn btn-primary" /></td>
						<td><input type="button" name="view" value="View" id="' . $row["ID"] . '" class="view_data btn btn-primary" /></td>
						<td><input type="button" name="delete" value="Delete" id="' . $row["ID"] . '" class="delete_data btn btn-primary" /></td>
					</tr>
				';
			}
			$output .= '</table>';
		}
		echo $output;
	}
?>