<?php
	include 'connection.php';
	session_start();	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		
		<link rel="stylesheet" type="text/css" href="styles/page.css"/>
		<link rel="stylesheet" type="text/css" href="styles/font-awesome.css"/>
		<link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700" rel="stylesheet">
		
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
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
					<button type="submit" class="search-button"><i class="fa fa-search" aria-hidden="true"></i></button>
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
			
				<h1>Searched Result</h1>
				<br/>
				
				<?php 
					$id = $_POST["searched"]; 
					$query = "SELECT * FROM students WHERE ID='$id'";
					$result = mysqli_query($conn, $query);
					
					$number = mysqli_num_rows($result);
					if($number==0){
						echo "<script>alert('No student with that ID');location.href='adminhome.php';</script>";
					}
					?>
					
					<div class="table-responsive">
					
					<div id="result_table">
						<table class="table table-bordered">
							<tr>
								<th width="15%">Student ID</th>
								<th width="30%">Student Name</th>
								<th width="12%">Edit Profile</th>
								<th width="12%">View Profile</th>
								<th width="12%">View Marks</th>
								<th width="12%">Delete Student</th>
							</tr>
							<?php
								while($row = mysqli_fetch_array($result)){	
							?>	
									<tr>
										<td><?php echo $row["ID"];?></td>
										<td><?php echo $row["Name"];?></td>
										<td><input type="button" name="edit" value="Edit Profile" id="<?php echo $row["ID"];?>" class="edit_data btn btn-primary"/></td>
										<td><input type="button" name="view" value="View Profile" id="<?php echo $row["ID"];?>" class="view_data btn btn-primary"/></td>
										<td><input type="button" name="viewM" value="View Marks" id="<?php echo $row["ID"];?>" class="view_marks btn btn-primary"/></td>
										<td><input type="button" name="delete" value="Delete Student" id="<?php echo $row["ID"];?>" class="delete_data btn btn-primary"/></td>
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

<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    <h4 class="modal-title">Student Details</h4>  
                </div>  
                <div class="modal-body" id="student_detail">  
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>
 
<div id="marksModal" class="modal fade">  
      <div class="modal-dialog mdialog">  
           <div class="modal-content mcontent">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    <h4 class="modal-title">Marks Details</h4>  
                </div>  
                <div class="modal-body" id="marks_detail">  
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
					<h4 class="modal-title">Insert New Student</h4> 
                </div>  
                <div class="modal-body">  
					<form method="POST" id="insert_form">
						
					<label>Enter student name</label>
					<input type="text" name="name" id="name" class="form-control"required/>
					<br/>
					
					<label>Enter student date of birth</label>
					<input type="date" name="bday" id="bday" class="form-control"required/>
					<br/>
					
					<label>Enter student address</label>
					<input type="text" name="address" id="address" class="form-control"required/>
					<br/>
					
					<label>Enter student phone number</label>
					<input type="text" name="phonenumber" id="phonenumber" class="form-control"required/>
					<br/>
					
					<label>Enter guardian name</label>
					<input type="text" name="guardian_name" id="guardian_name" class="form-control"required/>
					<br/>
					
					<label>Enter guardian address</label>
					<input type="text" name="guardian_address" id="guardian_address" class="form-control"required/>
					<br/>
					
					<label>Enter guardian phone number</label>
					<input type="text" name="guardian_phonenumber" id="guardian_phonenumber" class="form-control"required/>
					<br/>
					
					<label>Enter guardian status</label>
					<input type="text" name="guardian_status" id="guardian_status" class="form-control"required/>
					<br/>
					
					<input type="hidden" name="studentID" id="studentID"/>
					<input type="hidden" name="searched" value="<?php echo $id;?>"/>
					<input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success"/>
					<input type="reset" class="btn btn-danger">
							
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
                    <h4 class="modal-title">Delete this student?</h4>  
                </div>  
                <div class="modal-body">

					<input type="hidden" name="studentID" id="studentID"/>
					<input type="submit" value="Yes" class="btn btn-danger" id="btnyes"/>
					<input type="submit" value="No" class="btn btn-success" data-dismiss="modal"/>
					
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>
 
<script>

$(document).ready(function(){  
	$(document).on('click','.view_data',function(){  
        var student_id = $(this).attr("ID"); 
		if(student_id!=''){
			$.ajax({  
				url:"viewStudent.php",  
				method:"post",  
				data:{student_id:student_id},  
				success:function(data){  
					$('#student_detail').html(data);  
					$('#dataModal').modal("show");  
				}  
			}); 
		}	 
	});  

	$(document).on('click','.view_marks',function(){  
        var student_id = $(this).attr("ID"); 
		if(student_id!=''){
			$.ajax({  
				url:"view_marksResult.php",  
				method:"post",  
				data:{student_id:student_id},  
				success:function(data){  
					$('#marks_detail').html(data);  
					$('#marksModal').modal("show");  
				}  
			}); 
		}	 
	});

	$('#insert_form').on('submit', function(){
		$.ajax({  
			url:"edit_profileResult.php",  
			method:"POST",  
			data:$('#insert_form').serialize(),   
			success:function(data){  
				$('#insert_form')[0].reset();  
				$('#edit_dataModal').modal('hide');  
				$('#student_table').html(data);  
			}  
		});  
		
	});
	
	$(document).on('click', '.edit_data', function(){
		var student_id = $(this).attr("ID");
		$('#add_dataModal').modal('show');	
		if(student_id!=''){
			$.ajax({
				url:"showStudent.php",
				method:"POST",
				data:{studentID:student_id},
				dataType:"json",
				success:function(data){
					$('#name').val(data.Name);
					$('#bday').val(data.dateOfBirth);
					$('#address').val(data.Address);
					$('#phonenumber').val(data.phoneNumber);
					$('#guardian_name').val(data.guardianName);
					$('#guardian_address').val(data.guardianAddress);
					$('#guardian_phonenumber').val(data.guardianPhoneNumber);
					$('#guardian_status').val(data.guardianStatus);
					$('#studentID').val(data.ID);
					$('#insert').val("Update");
					
				}
			});
		}	
	});
 
	
	$(document).on('click','.delete_data',function(e){  
		e.preventDefault();
		var student_id = $(this).attr("ID");
		$('#deleteModal').modal("show");
		$('#btnyes').click(function() {
			$.ajax({  
				url:"deleteStudent.php",
				method:"POST",  
				data:{studentID:student_id},  
				success:function(data){   
					$('#studentID').val(data.ID); 
				}  
			});
			$(location).attr('href','adminhome.php');
			$('#deleteModal').modal('hide');
		});
		
	});  
 
 

});

</script>