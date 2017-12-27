<?php
	session_start();
	include 'connection.php';
	$query = "SELECT * FROM class ORDER BY Name ASC";
	$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Attendance</title>
		
		<link rel="stylesheet" type="text/css" href="styles/page.css"/>
		<link rel="stylesheet" type="text/css" href="styles/font-awesome.css"/>
		<link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700" rel="stylesheet"/>
		
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"/>
		
		<script type="text/javascript" src="script/bootbox.min.js"></script>
		
		
	</head>
	<body>
		<header>
			<div class="logo">
				<img src="styles/image/logo.png">
			</div>
			<h1>Kalam Kudus Information System</h1>

			<div class="search-wrapper">
				<form method="POST" action="searchReturn.php">
					<input type="text" name="searched" placeholder="Enter student ID..." class="search-box">
					<button  type="submit" class="search-button"><i class="fa fa-search" aria-hidden="true"></i></button>
				</form>
			</div>
		</header>

		<div id="container">

			<nav>
				<ul>
					<li><a href="adminhome.php"><img src="styles/image/icon1.png"><p>Dashboard</p></a></li>
					<li><a href="editStudent.php"><img src="styles/image/icon2.png"><p>Students</p></a></li>
					<li><a href="editTeacher.php"><img src="styles/image/icon3.png"><p>Teachers</p></a></li>
					<li><a href="editClass.php"><img src="styles/image/icon4.png"><p>Class</p></a></li>
					<li><a href="editMarks.php"><img src="styles/image/icon5.png"><p>Marks</p></a></li>
					<li><a href="editAttendance.php"><img src="styles/image/icon7.png"><p>Attendance</p></a></li>
					<li><a href="index.php"><img src="styles/image/icon6.png"><p>Log out</p></a></li>
				</ul>	
			</nav>

			<div class="content">
				<div style="margin-bottom: 20px;">
					<h1 style="display:inline;">All Attendance</h1>
				</div>
				
				
				<div class="table-responsive table-hover">
					
					<div id="attendance_table">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th width="55%">Class</th>
									<th width = "15%">Add Attendance</th>
									<th width = "15%">Edit Attendance</th>
									<th width = "15%">View Attendance</th>	
								</tr>
							</thead>
							<?php
								while($row = mysqli_fetch_array($result)){
								?>	
									<tr>
									
										<td>Grade <?php echo $row["Name"];?></td>
										<td><input type="button" name="viewAdd" value="Add Attendance" id="<?php echo $row["ID"];?>" class="viewAdd_data btn btn-primary"/></td>
										<td><input type="button" name="edit" value="Edit Attendance" id="<?php echo $row["ID"];?>" class="edit_data btn btn-primary"/></td>
										<td><input type="button" name="view" value="View Attendance" id="<?php echo $row["ID"];?>" class="view_data btn btn-primary"/></td>
									</tr>
								<?php
								}
								
								
							?>
						</table>
					</div>
				</div>

				
			</div>
		</div>

		<footer class="footer-container">

		</footer>
	
	
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
	
	</body>
</html>


<div id="view_attendanceModal" class="modal fade">  
      <div class="modal-dialog mdialog">  
           <div class="modal-content mcontent">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    <h4 class="modal-title">Attendance Details</h4>  
                </div>  
                <div class="modal-body" id="attendance_detail">
				<input type="hidden" name="attendanceID" id="attendanceID"/>
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>
 
 <div id="view_addAttendanceModal" class="modal fade">  
      <div class="modal-dialog mdialog">  
           <div class="modal-content mcontent">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    <h4 class="modal-title">Add Attendance</h4>  
                </div>  
                <div class="modal-body" id="addAttendance_detail">
				<input type="hidden" name="attendanceID" id="attendanceID"/>
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>
 
  <div id="view_editAttendanceModal" class="modal fade">  
      <div class="modal-dialog mdialog">  
           <div class="modal-content mcontent">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    <h4 class="modal-title">Edit Attendance</h4>  
                </div>  
                <div class="modal-body" id="editAttendance_detail">
				<input type="hidden" name="attendanceID" id="attendanceID"/>
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>
 
  
 <script>  
 
$(document).ready(function(){  
 
		
    $(document).on('click','.view_data',function(){  
        var attendance_id = $(this).attr("ID"); 
		if(attendance_id!=''){
			$.ajax({  
				url:"viewAttendance.php",  
				method:"post",  
				data:{attendance_id:attendance_id},  
				success:function(data){  
					$('#attendance_detail').html(data);  
					$('#view_attendanceModal').modal("show");  
				}  
			}); 
		}	 
	}); 

	$(document).on('click','.viewAdd_data',function(){  
        var attendance_id = $(this).attr("ID"); 
		if(attendance_id!=''){
			$.ajax({  
				url:"addAttendance.php",  
				method:"post",  
				data:{attendanceID:attendance_id},  
				success:function(data){  
					$('#addAttendance_detail').html(data);  
					$('#view_addAttendanceModal').modal("show");  
				}  
			}); 
		}	 
	}); 
	
	$(document).on('click','.edit_data',function(){  
        var attendance_id = $(this).attr("ID"); 
		if(attendance_id!=''){
			$.ajax({  
				url:"changeAttendance.php",  
				method:"post",  
				data:{attendanceID:attendance_id},  
				success:function(data){  
					$('#editAttendance_detail').html(data);  
					$('#view_editAttendanceModal').modal("show");  
				}  
			}); 
		}	 
	}); 

	
 });

 </script>


 