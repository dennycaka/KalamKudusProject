<?php
	session_start();
	include 'connection.php';
	$query = "SELECT * FROM class ORDER BY Name ASC";
	$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Subjects and Marks</title>
		
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
					<h1 style="display:inline;">All Marks</h1>
					<div style="float:right;margin-top:10px;">
						<button type="button" name="viewSubjects" id="viewSubjects" data-toggle="modal" data-target="#view_subjectsModal" class="btn btn-warning view_subjects">View All Subjects</button>
						<button type="button" name="add" id="add" data-toggle="modal" data-target="#add_subjectsModal" class="btn btn-warning">Add Subjects</button>
						<button type="button" name="editSubject" id="editSubject" data-toggle="modal" data-target="#edit_subjectsModal" class="btn btn-warning">Edit Subjects</button>
						<button type="button" name="deleteSubject" id="deleteSubject" data-toggle="modal" data-target="#delete_subjectsModal" class="btn btn-warning">Delete Subjects</button>
					</div>
				</div>
				<br/>
				
				<div class="table-responsive table-hover">
					
					<div id="marks_table">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th width="55%">Class</th>
									<th width = "15%">Add Marks</th>
									<th width = "15%">Edit Marks</th>
									<th width = "15%">View Marks</th>	
								</tr>
							</thead>
							<?php
								while($row = mysqli_fetch_array($result)){
								?>	
									<tr>
									
										<td>Grade <?php echo $row["Name"];?></td>
										<td><input type="button" name="viewAdd" value="Add Marks" id="<?php echo $row["ID"];?>" class="viewAdd_data btn btn-primary"/></td>
										<td><input type="button" name="edit" value="Edit Marks" id="<?php echo $row["ID"];?>" class="edit_data btn btn-primary"/></td>
										<td><input type="button" name="view" value="View Marks" id="<?php echo $row["ID"];?>" class="view_data btn btn-primary"/></td>
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


<div id="view_marksModal" class="modal fade">  
      <div class="modal-dialog mdialog">  
           <div class="modal-content mcontent">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    <h4 class="modal-title">Marks Details</h4>  
                </div>  
                <div class="modal-body" id="marks_detail">
				<input type="hidden" name="marksID" id="marksID"/>
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>
 
 <div id="view_addMarksModal" class="modal fade">  
      <div class="modal-dialog mdialog">  
           <div class="modal-content mcontent">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    <h4 class="modal-title">Add Marks</h4>  
                </div>  
                <div class="modal-body" id="addMarks_detail">
				<input type="hidden" name="marksID" id="marksID"/>
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>
 
  <div id="view_editMarksModal" class="modal fade">  
      <div class="modal-dialog mdialog">  
           <div class="modal-content mcontent">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    <h4 class="modal-title">Edit Marks</h4>  
                </div>  
                <div class="modal-body" id="editMarks_detail">
				<input type="hidden" name="marksID" id="marksID"/>
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>
 
 <div id="view_subjectsModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    <h4 class="modal-title">Subject Details</h4>  
                </div>  
                <div class="modal-body" id="subjects_detail">
					  <div class="table-responsive">  
						<table class="table table-bordered">
							<tr>
								<td width="40%">Number</td>
								<td width="60%">Subject Name</td>
							</tr>
							<?php
								$query = "SELECT * FROM subjects";
								$result = mysqli_query($conn,$query);
								$i = 1;
								while($row = mysqli_fetch_array($result)){
									?>
								
								<tr>
									<td width="40%"><?php echo $i;?></td>
									<td width="60%"><?php echo $row["Name"];?></td>
								</tr>	
								
								<?php	
								$i++;}
							?>
						</table>
					</div>
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>
 
 
  <div id="add_subjectsModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  	
					<h4 class="modal-title">Add Subjects</h4> 
                </div>  
                <div class="modal-body">  
					<form method="POST" id="insert_form">
					
					<label>Enter subjects name</label>
					<input type="text" name="subjectName" id="subjectName" class="form-control" required/>
					<br/>
						
					<input type="hidden" name="subjectID" id="subjectID"/>
					<input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success"/>
					<input type="reset" class="btn btn-danger">
						
					</form>
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>
 
  <div id="edit_subjectsModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  	
					<h4 class="modal-title">Edit Subjects</h4> 
                </div>  
                <div class="modal-body">  
					<form method="POST" id="insert_form" action="changeSubjectName.php">
					
					<label>Choose subjects name</label>
					<select name="oldSubject" class="form-control">
						<option>Subject</option>
						<?php
							$query2 = "SELECT * FROM subjects";
							$result2 = mysqli_query($conn,$query2);
							while($row2 = mysqli_fetch_array($result2)){ ?>
								<option><?php echo $row2["Name"] ;?></option>
							<?php
							}
						?>
					</select>
					<br/>
					<label>Enter new subjects name</label>
					<input type="text" name="newSubject" id="newSubject" class="form-control" required/>
					<br/>
						
					<input type="hidden" name="subjectID" id="subjectID"/>
					<input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success"/>
					<input type="reset" class="btn btn-danger">
						
					</form>
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>
 
 <div id="delete_subjectsModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  	
					<h4 class="modal-title">Delete Subjects</h4> 
                </div>  
                <div class="modal-body">  
					<form method="POST" action="deleteSubject.php">
					
					<label>Choose subjects name</label>
					<select name="deletedSubject" class="form-control">
						<option>Subject</option>
						<?php
							$query2 = "SELECT * FROM subjects";
							$result2 = mysqli_query($conn,$query2);
							while($row2 = mysqli_fetch_array($result2)){ ?>
								<option><?php echo $row2["Name"] ;?></option>
							<?php
							}
						?>
					</select>
					<br/>
						
					<input type="submit" value="Delete" class="btn btn-success"/>
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
                    <h4 class="modal-title">Delete this class?</h4>  
                </div>  
                <div class="modal-body">  
					<input type="hidden" name="classID" id="classID"/>
					<input type="submit" value="Yes" class="btn btn-success btnyes" id="btnyes"/>
					<input type="submit" value="No" class="btn btn-warning" data-dismiss="modal"/>
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
			url:"addSubjects.php",  
			method:"POST",  
			data:$('#insert_form').serialize(),   
			success:function(data){  
				$('#insert_form')[0].reset();  
				$('#add_subjectsModal').modal('hide');  
				$('#marks_table').html(data);  
				$(location).attr('href','editMarks.php');
			}  
		});  
		
	});
		
    $(document).on('click','.view_data',function(){  
        var marks_id = $(this).attr("ID"); 
		if(marks_id!=''){
			$.ajax({  
				url:"viewMarks.php",  
				method:"post",  
				data:{marks_id:marks_id},  
				success:function(data){  
					$('#marks_detail').html(data);  
					$('#view_marksModal').modal("show");  
				}  
			}); 
		}	 
	}); 

	$(document).on('click','.viewAdd_data',function(){  
        var marks_id = $(this).attr("ID"); 
		if(marks_id!=''){
			$.ajax({  
				url:"addMarks.php",  
				method:"post",  
				data:{marksID:marks_id},  
				success:function(data){  
					$('#addMarks_detail').html(data);  
					$('#view_addMarksModal').modal("show");  
				}  
			}); 
		}	 
	}); 
	
	$(document).on('click','.edit_data',function(){  
        var marks_id = $(this).attr("ID"); 
		if(marks_id!=''){
			$.ajax({  
				url:"changeMarks.php",  
				method:"post",  
				data:{marksID:marks_id},  
				success:function(data){  
					$('#editMarks_detail').html(data);  
					$('#view_editMarksModal').modal("show");  
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


 