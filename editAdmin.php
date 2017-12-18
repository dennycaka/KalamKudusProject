<?php
	session_start();
	include 'connection.php';
	$query = "SELECT * FROM admin";
	$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		
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
				<h1>Registered Administrators</h1>
				
				<div align="right">
					<button type="button" name="add" id="add" data-toggle="modal" data-target="#add_dataModal" class="btn btn-warning">Add Administrator</button>
					<button type="button" name="add" id="add" data-toggle="modal" data-target="#changePasswordModal" class="btn btn-warning">Change My Password</button>
				</div>
				
				<div class="table-responsive">
					
					<div id="admin_table">
						<table class="table table-bordered">
							<tr>
								<th width="55%">Administrator Name</th>
								<th width="15%">Edit</th>
								<th width="15%">View</th>
								<th width="15%">Delete</th>
							</tr>
							<?php
								while($row = mysqli_fetch_array($result)){
								?>	
									<tr>
										<td><?php echo $row["Name"];?></td>
										<td><input type="button" name="edit" value="Edit" id="<?php echo $row["ID"];?>" class="edit_data btn btn-primary"/></td>
										<td><input type="button" name="view" value="View" id="<?php echo $row["ID"];?>" class="view_data btn btn-primary"/></td>
										<td><input type="button" name="delete" value="Delete" id="<?php echo $row["ID"];?>" class="delete_data btn btn-primary"/></td>
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
                    <h4 class="modal-title">Administrator Details</h4>  
                </div>  
                <div class="modal-body" id="admin_detail">  
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
					<h4 class="modal-title">Insert New Administrator</h4> 
                </div>  
                <div class="modal-body">  
					<form method="POST" id="insert_form">
						
					<label>Enter admin name</label>
					<input type="text" name="name" id="name" class="form-control" required/>
					<br/>
						
					<input type="hidden" name="adminID" id="adminID"/>
					<input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success"/>
					<input type="reset" class="btn btn-danger"/>
						
					</form>
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>
 
  <div id="changePasswordModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  	
					<h4 class="modal-title">Change Password</h4> 
                </div>  
                <div class="modal-body">  
					<form method="POST" action="change_adminPassword.php">
					
					<label>Enter old password</label>
					<input type="password" name="oldpass" id="oldpass" class="form-control" required/>
					<br/>
					
					<label>Enter new password</label>
					<input type="password" name="password" id="password" class="form-control" required/>
					<br/>
					
					<label>Confirm new password</label>
					<input type="password" name="password2" id="password2" class="form-control" required/>
					<br/>
					
					<input type="hidden" name="adminID" id="adminID"/>
					<input type="submit" value="Save" class="btn btn-success"/>
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
                    <h4 class="modal-title">Delete this admin?</h4>  
                </div>  
                <div class="modal-body">  
					<input type="hidden" name="adminID" id="adminID"/>
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
	

	$(document).on('click', '.edit_data', function(){
		var admin_id = $(this).attr("ID");
		if(admin_id!=''){
			$.ajax({
				url:"show.php",
				method:"POST",
				data:{adminID:admin_id},
				dataType:"json",
				success:function(data){
					$('#name').val(data.Name);
					$('#adminID').val(data.ID);
					$('#insert').val("Update");
					$('#add_dataModal').modal('show');
				}
			});
		}
	});
 
	
	
	$('#insert_form').on('submit', function(){
		$.ajax({  
			url:"addAdmin.php",  
			method:"POST",  
			data:$('#insert_form').serialize(),   
			success:function(data){  
				$('#insert_form')[0].reset();  
				$('#add_dataModal').modal('hide');  
				$('#admin_table').html(data);  
				$(location).attr('href','editAdmin.php');
			}  
		});  
		
	});
 
    $(document).on('click','.view_data',function(){  
        var admin_id = $(this).attr("ID"); 
		if(admin_id!=''){
			$.ajax({  
				url:"viewAdmin.php",  
				method:"post",  
				data:{admin_id:admin_id},  
				success:function(data){  
					$('#admin_detail').html(data);  
					$('#dataModal').modal("show");  
				}  
			}); 
		}	 
	});  
		
	$(document).on('click','.delete_data',function(e){  
		e.preventDefault();
		var admin_id = $(this).attr("ID");
		$('#deleteModal').modal("show");
		$('#btnyes').click(function() {
			$.ajax({  
				url:"deleteAdmin.php",
				method:"POST",  
				data:{adminID:admin_id},  
				success:function(data){   
					$('#adminID').val(data.ID); 
				}  
			});
			$(location).attr('href','editAdmin.php');
			$('#deleteModal').modal('hide');
		});
		
	});  
	

	
 });

 </script>


 