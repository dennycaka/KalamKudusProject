<?php
	session_start();
	include 'connection.php';
	$query = "SELECT * FROM class ORDER BY Name ASC";
	$result = mysqli_query($conn, $query);
		
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Classes</title>
		
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
					<li><a href="index.php"><img src="styles/image/icon6.png"><p>Log out</p></a></li>
				</ul>	
			</nav>

			<div class="content">
				<div style="margin-bottom: 20px;">
					<h1 style="display:inline;">All Classes</h1>
					<div style="float:right;margin-top:10px;">
						<button type="button" name="add" id="add" data-toggle="modal" data-target="#add_dataModal" class="btn btn-warning">Add New Class</button>
						<button type="button" name="add" id="add2" data-toggle="modal" data-target="#add_studentModal" class="btn btn-warning">Add Student</button>
						<button type="button" name="add" id="add3" data-toggle="modal" data-target="#add_scheduleModal" class="btn btn-warning">Add New Schedule</button>
						<button type="button" name="editS" id="editS" data-toggle="modal" data-target="#editScheduleModal" class="btn btn-warning">Edit Schedule</button>
					</div>
				</div>
				<br/>
				
				<div class="table-responsive">
					
					<div id="schedule_table">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th width="40">Class</th>
									<th width = "15%">View Schedule</th>
									<th width = "15%">View Student</th>
									<th width = "15%">Edit Class Name</th>
									<th width = "15%">Delete Class</th>
									
								</tr>
							</thead>
							<?php
								while($row = mysqli_fetch_array($result)){
								?>	
									<tr>
										<td>Grade <?php echo $row["Name"];?></td>
										
										<td><input type="button" name="view" value="View Schedule" id="<?php echo $row["ID"];?>" class="view_data btn btn-primary"/></td>
										<td><input type="button" name="view2" value="View Student" id="<?php echo $row["ID"];?>" class="view_student btn btn-primary"/></td>
										<td><input type="button" name="editC" value="Edit Class Name" id="<?php echo $row["ID"];?>" class="edit_className btn btn-primary"/></td>
										<td><input type="button" name="DeleteC" value="Delete Class" id="<?php echo $row["ID"];?>" class="delete_class btn btn-primary"/></td>
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


<div id="view_scheduleModal" class="modal fade">  
      <div class="modal-dialog mdialog">  
           <div class="modal-content mcontent">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    <h4 class="modal-title">Schedule Details</h4>  
                </div>  
                <div class="modal-body" id="schedule_detail">
					
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>
 
 <div id="view_studentModal" class="modal fade">  
      <div class="modal-dialog ">  
           <div class="modal-content ">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    <h4 class="modal-title">Students in This Class</h4>  
                </div>  
                <div class="modal-body" id="student_detail">
					
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>
 
 <div id="add_dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  	
					<h4 class="modal-title">Insert New class</h4> 
                </div>  
                <div class="modal-body">  
					<form method="POST" id="insert_form">
						
					<label>Enter class name</label>
					<input type="text" name="name" id="name" class="form-control" required/>
					<br/>
						
					<input type="hidden" name="classID" id="classID"/>
					<input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success"/>
					<input type="reset" class="btn btn-danger">
						
					</form>
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>
 
  <div id="add_studentModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  	
					<h4 class="modal-title">Add Student</h4> 
                </div>  
                <div class="modal-body">  
					<form method="POST" id="insert_form2">
					<label>Choose the class</label>
						<select name="grade" class="form-control">
							<option>Class</option>
							<?php
								$query = "SELECT * FROM class ORDER BY Name ASC";
								$result = mysqli_query($conn, $query);
								while($row = mysqli_fetch_array($result)){
								?>
									<option><?php echo $row["Name"] ?></option>
								<?php
								}
							?>
						</select>
					<br/>
					
					<label>Enter student ID</label>
					<input type="text" name="stuID" id="stuID" class="form-control" required/>
					<br/>
						
					<input type="hidden" name="classID" id="classID"/>
					<input type="submit" name="insert" id="insert2" value="Insert" class="btn btn-success"/>
					<input type="reset" class="btn btn-danger">
						
					</form>
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>
 
   <div id="add_scheduleModal" class="modal fade">  
      <div class="modal-dialog mdialog">  
           <div class="modal-content mcontent">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  	
					<h4 class="modal-title">Add Schedule</h4> 
                </div>  
                <div class="modal-body">  
					<form method="POST" id="insert_form3">
					<label>Choose the class</label>
						<select name="grade2" class="form-control col-2">
							<option>Class</option>
							<?php
								$query = "SELECT * FROM class ORDER BY Name ASC";
								$result = mysqli_query($conn, $query);
								while($row = mysqli_fetch_array($result)){
								?>
									<option><?php echo $row["Name"] ?></option>
								<?php
								}
							?>
						</select>
					<br/>	
					
					<?php for($x=1; $x<6; $x++){
						$GLOBALS['day']="";
						if($x==1){
							$label = "Monday";
							$GLOBALS['day']="mon";
						}
						else if($x==2){
							$label = "Tuesday";
							$GLOBALS['day']="tue";
						}
						else if($x==3){
							$label = "Wednesday";
							$GLOBALS['day']="wed";
						}
						else if($x==4){
							$label = "Thursday";
							$GLOBALS['day']="thu";
						}
						else{
							$label = "Friday";
							$GLOBALS['day']="fri";
						}
						
						?>
						
						<span style="display:inline-block;width:100px;margin-right:20px;"><label><?php echo $label?></label></span>
						<div class="form-group row">
						
							<div class="col-2">
							<select name=<?php  echo $GLOBALS['day'];echo 1?> class="form-control">
								<option>Period 1</option>
								<?php
									$query2 = "SELECT * FROM subjects";
									$result2 = mysqli_query($conn, $query2);
									while($row2 = mysqli_fetch_array($result2)){
									?>
										<option><?php echo $row2["Name"] ?></option>
									<?php
									}
									echo $day;
								?>
							</select>
							</div>
							
							<div class="col-2">
							<select name=<?php  echo $GLOBALS['day'];echo 2?> class="form-control">
								<option>Period 2</option>
								<?php
									$query2 = "SELECT * FROM subjects";
									$result2 = mysqli_query($conn, $query2);
									while($row2 = mysqli_fetch_array($result2)){
									?>
										<option><?php echo $row2["Name"] ?></option>
									<?php
									}
									echo $day;
								?>
							</select>
							</div>
							
							<div class="col-2">
							<select name=<?php  echo $GLOBALS['day'];echo 3?> class="form-control">
								<option>Period 3</option>
								<?php
									$query2 = "SELECT * FROM subjects";
									$result2 = mysqli_query($conn, $query2);
									while($row2 = mysqli_fetch_array($result2)){
									?>
										<option><?php echo $row2["Name"] ?></option>
									<?php
									}
									echo $day;
								?>
							</select>
							</div>
							
							<div class="col-2">
							<select name=<?php  echo $GLOBALS['day'];echo 4?> class="form-control">
								<option>Period 4</option>
								<?php
									$query2 = "SELECT * FROM subjects";
									$result2 = mysqli_query($conn, $query2);
									while($row2 = mysqli_fetch_array($result2)){
									?>
										<option><?php echo $row2["Name"] ?></option>
									<?php
									}
									echo $day;
								?>
							</select>
							</div>
							
							<div class="col-2">
							<select name=<?php  echo $GLOBALS['day'];echo 5?> class="form-control">
								<option>Period 5</option>
								<?php
									$query2 = "SELECT * FROM subjects";
									$result2 = mysqli_query($conn, $query2);
									while($row2 = mysqli_fetch_array($result2)){
									?>
										<option><?php echo $row2["Name"] ?></option>
									<?php
									}
									echo $day;
								?>
							</select>
							</div>
							
							
						</div>
					
						<br>
					<?php
					}
					?>
						
					<br>
					<input type="hidden" name="classID" id="classID"/>
					<input type="submit" name="insert" id="insert3" value="Insert" class="btn btn-success"/>
					<input type="reset" class="btn btn-danger">
						
					</form>
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>

 
 <div id="editScheduleModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    <h4 class="modal-title">Edit Schedule</h4>  
                </div>  
                <div class="modal-body">  
					<form method="POST" action="changeSchedule.php">
						
						<label>Choose class</label>
						<select name="class" class="form-control">
							<option>Class</option>
							<?php
								$query = "SELECT * FROM class ORDER BY Name ASC";
								$result = mysqli_query($conn, $query);
								while($row = mysqli_fetch_array($result)){
								?>
									<option><?php echo $row["Name"] ?></option>
								<?php
								}
							?>
						</select>
						<br/>
						
						<label>Choose day</label>
						<select name="day" class="form-control">
							<option>Day</option>
							<option>Monday</option>
							<option>Tuesday</option>
							<option>Wednesday</option>
							<option>Thursday</option>
							<option>Friday</option>
						</select>
						<br/>
					
						<label>Choose period</label>
						<select name="period" class="form-control">
							<option>Period</option>
							<option value="p1">Period 1</option>
							<option value="p2">Period 2</option>
							<option value="p3">Period 3</option>
							<option value="p4">Period 4</option>
							<option value="p5">Period 5</option>
						</select>
						<br/>
					
						<label>Choose subject</label>
						<select name="subject" class="form-control">
							<option>Subject</option>
							<?php
								$query2 = "SELECT * FROM subjects";
								$result2 = mysqli_query($conn, $query2);
								while($row2 = mysqli_fetch_array($result2)){
								?>
									<option><?php echo $row2["Name"] ?></option>
								<?php
								}
							?>
						</select>
						<br/>
						
						<input type="submit" value="Yes" class="btn btn-success"/>
						<input type="submit" value="No" class="btn btn-danger" data-dismiss="modal"/>
						
					</form>
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>
 
 <div id="deleteModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    <h4 class="modal-title">Delete this class?</h4>  
                </div>  
                <div class="modal-body">  
					<input type="hidden" name="classID" id="classID"/>
					<input type="submit" value="Yes" class="btn btn-success btnyes" id="btnyes"/>
					<input type="submit" value="No" class="btn btn-danger" data-dismiss="modal"/>
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>


  
 <script>  
 
$(document).ready(function(){  
 
	$('#add').click(function(){  
        $('#insert').val("Insert");  
        $('#insert_form')[0].reset();  
    });  
	
	$('#add2').click(function(){  
        $('#insert2').val("Insert");  
        $('#insert_form2')[0].reset();  
    });

	$('#add3').click(function(){  
        $('#insert3').val("Insert");  
        $('#insert_form3')[0].reset();  
    });  
	

 
	$(document).on('click', '.edit_className', function(){
		var class_id = $(this).attr("ID");
		if(class_id!=''){
			$.ajax({
				url:"showClass.php",
				method:"POST",
				data:{classID:class_id},
				dataType:"json",
				success:function(data){
					$('#name').val(data.Name);
					$('#classID').val(data.ID);
					$('#insert').val("Update");
					$('#add_dataModal').modal('show');
				}
			});
		}
	});
	
	$(document).on('click', '.edit_className', function(){
		var class_id = $(this).attr("ID");
		if(class_id!=''){
			$.ajax({
				url:"showClass.php",
				method:"POST",
				data:{classID:class_id},
				dataType:"json",
				success:function(data){
					$('#name').val(data.Name);
					$('#classID').val(data.ID);
					$('#insert').val("Update");
					$('#add_dataModal').modal('show');
				}
			});
		}
	});
 
	
	
	$('#insert_form').on('submit', function(){
		$.ajax({  
			url:"addClass.php",  
			method:"POST",  
			data:$('#insert_form').serialize(),   
			success:function(data){  
				$('#insert_form')[0].reset();  
				$('#add_dataModal').modal('hide');  
				$('#schedule_table').html(data);  
				$(location).attr('href','editClass.php');
			}  
		});  
		
	});
	
	$('#insert_form2').on('submit', function(){
		$.ajax({  
			url:"addClassStudent.php",  
			method:"POST",  
			data:$('#insert_form2').serialize(),   
			success:function(data){  
				$('#insert_form2')[0].reset();  
				$('#add_studentModal').modal('hide');  
				$('#schedule_table').html(data);  
				$(location).attr('href','editClass.php');
			}  
		});  
		
	});
	
	$('#insert_form3').on('submit', function(){
		$.ajax({  
			url:"addClassSchedule.php",  
			method:"POST",  
			data:$('#insert_form3').serialize(),   
			success:function(data){  
				$('#insert_form3')[0].reset();  
				$('#add_scheduleModal').modal('hide');  
				$('#schedule_table').html(data);  
				$(location).attr('href','editClass.php');
			}  
		});  
		
	});
 
 
    $(document).on('click','.view_data',function(){  
        var schedule_id = $(this).attr("ID"); 
		if(schedule_id!=''){
			$.ajax({  
				url:"viewSchedule.php",  
				method:"post",  
				data:{schedule_id:schedule_id},  
				success:function(data){  
					$('#schedule_detail').html(data);  
					$('#view_scheduleModal').modal("show");  
				}  
			}); 
		}	 
	});  
	
	$(document).on('click','.view_student',function(){  
        var schedule_id = $(this).attr("ID"); 
		if(schedule_id!=''){
			$.ajax({  
				url:"viewClassStudent.php",  
				method:"post",  
				data:{schedule_id:schedule_id},  
				success:function(data){  
					$('#student_detail').html(data);  
					$('#view_studentModal').modal("show");  
				}  
			}); 
		}	 
	});  
		
	$(document).on('click','.delete_class',function(e){  
		e.preventDefault();
		var class_id = $(this).attr("ID");
		$('#deleteModal').modal("show");
		$('#btnyes').click(function() {
			$.ajax({  
				url:"deleteClass.php",
				method:"POST",  
				data:{classID:class_id},  
				success:function(data){   
					$('#classID').val(data.ID); 
				}  
			});
			$(location).attr('href','editClass.php');
			$('#deleteModal').modal('hide');
		});
		
	});  
	
 });

 </script>


 