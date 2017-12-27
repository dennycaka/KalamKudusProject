<?php
	session_start();
	include 'connection.php';
	if(!empty($_POST)){
		$output = "";
		
		$query = "SELECT * FROM CLASS WHERE ID='".$_POST["attendanceID"]."'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);
		$name = $row["Name"];
		
		$query2 = "SHOW TABLES FROM loginsystem LIKE '%class$name%'";
		$result2 = mysqli_query($conn, $query2);
		$row2 = mysqli_fetch_array($result2);
		
		$query3 = "SELECT * FROM $row2[0]";
		$result3 = mysqli_query($conn,$query3);
		
		$query5 = "SELECT * FROM month";
		$result5 = mysqli_query($conn,$query5);
		
		$output .= '  
		<form method="POST" id="insert_form"> 
			<div class="form-group row">
			<div class="col-4">
			<label>Choose student</label>
				
				<select name="name" class="form-control">
				<option>Student Name</option>';
				
				while($row3=mysqli_fetch_array($result3)){
					$query4 = "SELECT * FROM students WHERE ID = '".$row3["studentID"]."'";
					$result4 = mysqli_query($conn, $query4);
					$row4 = mysqli_fetch_array($result4);
					
					$output.='
					<option>'.$row4["Name"].'</option>';
				}
			
			$output.='</select></div><br/>
			<div class="col-3">
			<label>Choose month</label>
				<select name="month" class="form-control">
				<option>Month</option>';
				
				while($row5=mysqli_fetch_array($result5)){
					$output.='
					<option>'.$row5["Month"].'</option>';
				}
				
			$output.= '</select></div>
				<div class="col-3">
					<label>Choose absence type</label>
					<select name="absence" class="form-control">
					<option value="sick">Illness</option>
					<option value="trip">Vacation/trip</option>
					<option value="ber">Bereavement</option>
					<option value="unver">Unverified</option>
					<option value="late">Lateness</option>
					</select>
				</div>
				
				<div class="col-2">
					<label>New absence day</label>
					<input class="form-control" name ="new_attendance" id="new_attendance" type="number" step="any">
				</div>
				</div><br/>';
				
				
				
			$id =  $_POST["attendanceID"];
			
			
			$output.='<input type="hidden" name="attendanceID" id="attendanceID" value ="'.$id.'"/>
				<input type="submit" name="insert" id="insert" value="Update" class="btn btn-success"/>
				<input type="reset" class="btn btn-danger"/></form>';
		
		echo $output;
		
	}

?>
 <script>
	$(document).ready(function(){
		
		$('#insert_form').on('submit', function(){
			$.ajax({  
				url:"changeAttendance2.php",  
				method:"POST",  
				data:$('#insert_form').serialize(),   
				success:function(data){  
					$('#insert_form')[0].reset(); 
					$$('#attendance_table').html(data); 
					$(location).attr('href','editAttendance.php');
				}  
			});  
			
		});
		
		
	});
 </script>