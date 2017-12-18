<?php
	session_start();
	include 'connection.php';
	$query = "SELECT * FROM teachers";
	$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Teacher</title>
		
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
					<h1 style="display:inline;">Registered Teachers</h1>
					<button style="float:right; margin-top:10px;" type="button" name="add" id="add" data-toggle="modal" data-target="#add_dataModal" class="btn btn-warning">Add new teacher</button>
				</div>
				<br/>
				
				<div class="table-responsive">
					
					<div id="teacher_table">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th width="20%">Teacher ID</th>
									<th width="35%">Teacher Name</th>
									<th width="15%">Edit Profile</th>
									<th width="15%">View Profile</th>
									<th width="15%">Delete Teacher</th>
								</tr>
							</thead>
							<?php
								$halaman = 6;
								$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
								$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
								$total = mysqli_num_rows($result);
								$pages = ceil($total/$halaman);            
								$query3 = "SELECT * FROM teachers LIMIT $mulai, $halaman";
								$result3 = mysqli_query($conn, $query3); 
								
								while($row = mysqli_fetch_array($result3)){
								?>	
									<tr>
										<td><?php echo $row["ID"];?></td>
										<td><?php echo $row["Name"];?></td>
										<td><input type="button" name="edit" value="Edit Profile" id="<?php echo $row["ID"];?>" class="edit_data btn btn-primary"/></td>
										<td><input type="button" name="view" value="View Profile" id="<?php echo $row["ID"];?>" class="view_data btn btn-primary"/></td>
										<td><input type="button" name="delete" value="Delete Teacher" id="<?php echo $row["ID"];?>" class="delete_data btn btn-primary"/></td>
									</tr>
								<?php
								}
								
								
							?>
						</table>
					</div>
				</div>
				<br/>
				<ul class="pagination justify-content-center">
					<?php for ($i=1; $i<=$pages ; $i++){ ?>
						<li class="page-item"><a class="page-link" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
				 
					<?php 
					} 
					?>
				</ul>

				
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
                    <h4 class="modal-title">Teacher Details</h4>  
                </div>  
                <div class="modal-body" id="teacher_detail">  
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
					<h4 class="modal-title">Insert New Teacher</h4> 
                </div>  
                <div class="modal-body">  
					<form method="POST" id="insert_form">
						
					<label>Enter teacher name</label>
					<input type="text" name="name" id="name" class="form-control"required/>
					<br/>
					
					<label>Enter teacher date of birth</label>
					<input type="date" name="bday" id="bday" class="form-control"required/>
					<br/>
					
					<label>Enter teacher religion</label>
					<input type="text" name="religion" id="religion" class="form-control"required/>
					<br/>
					
					<label>Enter teacher address</label>
					<input type="text" name="address" id="address" class="form-control"required/>
					<br/>
					
					<label>Enter teacher phone number</label>
					<input type="text" name="phonenumber" id="phonenumber" class="form-control"required/>
					<br/>
					
					<label>Enter teacher subject</label>
					<select id="subject" name="subject" class="form-control">
						<option>Subject</option>
						<?php
							$query = "SELECT * FROM subjects";
							$result = mysqli_query($conn, $query);
							while($row = mysqli_fetch_array($result)){?>
								<option><?php echo $row["Name"];?></option>
							<?php
							}
							
						?>
					</select>
					<br/>
					
					<input type="hidden" name="teacherID" id="teacherID"/>
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
                    <h4 class="modal-title">Delete this teacher?</h4>  
                </div>  
                <div class="modal-body">  
				
					<input type="hidden" name="teacherID" id="teacherID"/>
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
 
	$('#add').click(function(){  
        $('#insert').val("Insert");  
        $('#insert_form')[0].reset();  
    });  
	
	
	$(document).on('click', '.edit_data', function(){
		var teacher_id = $(this).attr("ID");
		if(teacher_id!=''){
			$.ajax({
				url:"showTeacher.php",
				method:"POST",
				data:{teacherID:teacher_id},
				dataType:"json",
				success:function(data){
					$('#name').val(data.Name);
					$('#bday').val(data.dateOfBirth);
					$('#religion').val(data.Religion);
					$('#address').val(data.Address);
					$('#phonenumber').val(data.phoneNumber);
					$('#subject').val(data.subject);
					$('#teacherID').val(data.ID);
					$('#insert').val("Update");
					$('#add_dataModal').modal('show');
				}
			});
		}
	});
 
 
	$('#insert_form').on('submit', function(){
		$.ajax({  
			url:"addTeacher.php",  
			method:"POST",  
			data:$('#insert_form').serialize(),   
			success:function(data){  
				$('#insert_form')[0].reset();  
				$('#add_dataModal').modal('hide');  
				$('#teacher_table').html(data);  
			}  
		});  
		
	});
 
 
    $(document).on('click','.view_data',function(){  
        var teacher_id = $(this).attr("ID"); 
		if(teacher_id!=''){
			$.ajax({  
				url:"viewTeacher.php",  
				method:"post",  
				data:{teacher_id:teacher_id},  
				success:function(data){  
					$('#teacher_detail').html(data);  
					$('#dataModal').modal("show");  
				}  
			}); 
		}	 
	});  
	
		
	$(document).on('click','.delete_data',function(e){  
		e.preventDefault();
		var teacher_id = $(this).attr("ID");
		$('#deleteModal').modal("show");
		$('#btnyes').click(function() {
			$.ajax({  
				url:"deleteTeacher.php",
				method:"POST",  
				data:{teacherID:teacher_id},  
				success:function(data){   
					$('#teacherID').val(data.ID); 
				}  
			});
			$(location).attr('href','editTeacher.php');
			$('#deleteModal').modal('hide');
		});
		
	});  
		
 });

 </script>


 