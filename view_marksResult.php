<?php
	session_start();
	include 'connection.php';
	
	if(!empty($_POST)){
		
		$output ="";
		$id = $_POST["student_id"];
		$query = "SELECT * FROM class";
		$result = mysqli_query($conn, $query);
		
		
		$output .= '  
	  
		<div class="table-responsive">  
           <table class="table table-bordered">
		   
			<tr>
				<th width="14%">Subject</th>
				<th width="14%">Assignment 1</th>
				<th width="14%">Assignment 2</th>
				<th width="14%">Test 1</th>
				<th width="14%">Test 2</th>
				<th width="14%">Test 3</th>
				<th width="14%">Final Exam</th>
			</tr>';
		
		
		while($row = mysqli_fetch_array($result)){
			$name = $row["Name"];
			
			$query2 = "SELECT * FROM class$name WHERE studentID='$id'";
			$result2 = mysqli_query($conn, $query2);
			
			if($row2 = mysqli_fetch_array($result2)){
				$query3 = "SELECT * FROM marks$name WHERE studentID='$id'";
				$result3 = mysqli_query($conn, $query3);
				
				while($row3 = mysqli_fetch_array($result3)){
					$output .= '  
					<tr>  
						<td width="14%">'.$row3["subject"].'</td>
						<td width="14%">'.$row3["assignment1"].'</td>
						<td width="14%">'.$row3["assignment2"].'</td>
						<td width="14%">'.$row3["test1"].'</td>
						<td width="14%">'.$row3["test2"].'</td>
						<td width="14%">'.$row3["test3"].'</td>
						<td width="14%">'.$row3["finalExam"].'</td>
					</tr>';  
				}
			}
		}
		$output .= "</table></div>";
		echo $output;	
		
		
	}
?>