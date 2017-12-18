<?php
	include 'connection.php';
	session_start();	
	
	$query= "SELECT * FROM students WHERE ID='".$_SESSION['uid']."'";
	$result= mysqli_query($conn,$query);
	
	$result2 = mysqli_query($conn,$query);
	$row2 = mysqli_fetch_array($result2);
	
	$result3 = mysqli_query($conn,$query);
	$row3 = mysqli_fetch_array($result3);
	$id = $row3["ID"];
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>My Profile</title>
		
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

		</header>

		<div id="container">

			<nav>
				<ul>
					<li><a href="studenthome.php"><img src="styles/image/icon1.png"><p>Dashboard</p></a></li>
					<li><a href="studentViewTeacher.php"><img src="styles/image/icon3.png"><p>Teachers</p></a></li>
					<li><a href="studentViewMarks.php"><img src="styles/image/icon5.png"><p>Marks</p></a></li>
					<li><a href="index.php"><img src="styles/image/icon6.png"><p>Log out</p></a></li>
				</ul>	
			</nav>

			<div class="content">
				
				<h1>My Profile - Enrolled in 20<?php echo substr($row2["ID"],0,-6);?></h1>
				<br/>
				
				<div class="table-responsive">
						<div id="profile_table">
							<table class="table table-bordered table-hover">
						
								<?php
									while($row = mysqli_fetch_array($result)){
									?>	
										<tr>
											<td>ID</td>
											<td><?php echo $row["ID"];?></td>
										</tr>
										<tr>
											<td>Name</td>
											<td><?php echo $row["Name"];?></td>
											<td><button type="button" name="name" id="<?php echo $row["ID"];?>" data-toggle="modal" data-target="#editNameModal" class="btn btn-primary editName">Edit Information</button></td>
										</tr>
										<tr>
											<td>Date of Birth</td>
											<td><?php echo $row["dateOfBirth"];?></td>
											<td><button type="button" name="bday" id="<?php echo $row["ID"];?>" data-toggle="modal" data-target="#editBdayModal" class="btn btn-primary editBday">Edit Information</button></td>
										</tr>
										<tr>
											<td>Address</td>
											<td><?php echo $row["Address"];?></td>
											<td><button type="button" name="address" id="<?php echo $row["ID"];?>" data-toggle="modal" data-target="#editAddressModal" class="btn btn-primary editAddress">Edit Information</button></td>
										</tr>
										<tr>
											<td>Phone Number</td>
											<td><?php echo $row["phoneNumber"];?></td>
											<td><button type="button" name="pnum" id="<?php echo $row["ID"];?>" data-toggle="modal" data-target="#editStudPhonNumModal" class="btn btn-primary editPhonNum">Edit Information</button></td>
										</tr>
										
										<tr>
											<td>Guardian Name</td>
											<td><?php echo $row["guardianName"];?></td>
											<td><button type="button" name="gName" id="<?php echo $row["ID"];?>" data-toggle="modal" data-target="#editGuardianNameModal" class="btn btn-primary editGuarName">Edit Information</button></td>
										</tr>
										<tr>
											<td>Guardian Adress</td>
											<td><?php echo $row["guardianAddress"];?></td>
											<td><button type="button" name="gAddress" id="<?php echo $row["ID"];?>" data-toggle="modal" data-target="#editGuardianAddressModal" class="btn btn-primary editGuarAddress">Edit Information</button></td>
										</tr>
										<tr>
											<td>Guardian Phone Number</td>
											<td><?php echo $row["guardianPhoneNumber"];?></td>
											<td><button type="button" name="gPhonum" id="<?php echo $row["ID"];?>" data-toggle="modal" data-target="#editGuardianPnumModal" class="btn btn-primary editGuarPhonNum">Edit Information</button></td>
										</tr>
										<tr>
											<td>Guardian Status</td>
											<td><?php echo $row["guardianStatus"];?></td>
											<td><button type="button" name="gStatus" id="<?php echo $row["ID"];?>" data-toggle="modal" data-target="#editGuardianStatusModal" class="btn btn-primary editStatus">Edit Information</button></td>
										</tr>
									<?php
									}
									
								?>
						</div>
							</table>
		
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

<div id="editNameModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  	
					<h4 class="modal-title">Edit My Name</h4> 
                </div>  
                <div class="modal-body">  
					<form method="POST" action="studentUpdateProfile.php">
						
					<label>Enter updated name</label>
					<input type="text" name="name" id="name" class="form-control"required/>
					<br/>
					<input type="hidden" name="studentID" id="studentID" value="<?php echo $id;?>"/>
					<input type="submit" name="insert" id="insert" value="Save" class="btn btn-success"/>
					<input type="reset" class="btn btn-danger">
						
					</form>
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>
 
 <div id="editBdayModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  	
					<h4 class="modal-title">Edit My Date Of Birth</h4> 
                </div>  
                <div class="modal-body">  
					<form method="POST" action="studentUpdateProfile.php">
						
					<label>Enter updated date of birth</label>
					<input type="date" name="bday" id="bday" class="form-control"required/>
					<br/>
					<input type="hidden" name="studentID" id="studentID" value="<?php echo $id;?>"/>
					<input type="submit" name="insert" id="insert" value="Save" class="btn btn-success"/>
					<input type="reset" class="btn btn-danger">
						
					</form>
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>
 
<div id="editAddressModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  	
					<h4 class="modal-title">Edit My Address</h4> 
                </div>  
                <div class="modal-body">  
					<form method="POST" action="studentUpdateProfile.php">
						
					<label>Enter updated address</label>
					<input type="text" name="address" id="address" class="form-control"required/>
					<br/>
					<input type="hidden" name="studentID" id="studentID" value="<?php echo $id;?>"/>
					<input type="submit" name="insert" id="insert" value="Save" class="btn btn-success"/>
					<input type="reset" class="btn btn-danger">
						
					</form>
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>
 
  <div id="editStudPhonNumModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  	
					<h4 class="modal-title">Edit My Phone Number</h4> 
                </div>  
                <div class="modal-body">  
					<form method="POST" action="studentUpdateProfile.php">
						
					<label>Enter updated phone number</label>
					<input type="text" name="pnum" id="pnum" class="form-control"required/>
					<br/>
					<input type="hidden" name="studentID" id="studentID" value="<?php echo $id;?>"/>
					<input type="submit" name="insert" id="insert" value="Save" class="btn btn-success"/>
					<input type="reset" class="btn btn-danger">
						
					</form>
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>

 <div id="editGuardianNameModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  	
					<h4 class="modal-title">Edit My Guardian Name</h4> 
                </div>  
                <div class="modal-body">  
					<form method="POST" action="studentUpdateProfile.php">
						
					<label>Enter updated guardian name</label>
					<input type="text" name="name_g" id="name_g" class="form-control"required/>
					<br/>
					<input type="hidden" name="studentID" id="studentID" value="<?php echo $id;?>"/>
					<input type="submit" name="insert" id="insert" value="Save" class="btn btn-success"/>
					<input type="reset" class="btn btn-danger">
						
					</form>
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>
 
 <div id="editGuardianAddressModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  	
					<h4 class="modal-title">Edit My Guardian Address</h4> 
                </div>  
                <div class="modal-body">  
					<form method="POST" action="studentUpdateProfile.php">
						
					<label>Enter updated guardian address</label>
					<input type="text" name="address_g" id="address_g" class="form-control"required/>
					<br/>
					<input type="hidden" name="studentID" id="studentID" value="<?php echo $id;?>"/>
					<input type="submit" name="insert" id="insert" value="Save" class="btn btn-success"/>
					<input type="reset" class="btn btn-danger">
						
					</form>
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>

 <div id="editGuardianPnumModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  	
					<h4 class="modal-title">Edit My Guardian Phone Number</h4> 
                </div>  
                <div class="modal-body">  
					<form method="POST" action="studentUpdateProfile.php">
						
					<label>Enter updated guardian phone number</label>
					<input type="text" name="pnum_g" id="pnum_g" class="form-control"required/>
					<br/>
					<input type="hidden" name="studentID" id="studentID" value="<?php echo $id;?>"/>
					<input type="submit" name="insert" id="insert" value="Save" class="btn btn-success"/>
					<input type="reset" class="btn btn-danger">
						
					</form>
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>
 
 <div id="editGuardianStatusModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  	
					<h4 class="modal-title">Edit My Guardian Status</h4> 
                </div>  
                <div class="modal-body">  
					<form method="POST" action="studentUpdateProfile.php">
						
					<label>Enter updated guardian status</label>
					<input type="text" name="status" id="status" class="form-control"required/>
					<br/>
					<input type="hidden" name="studentID" id="studentID" value="<?php echo $id;?>"/>
					<input type="submit" name="insert" id="insert" value="Save" class="btn btn-success"/>
					<input type="reset" class="btn btn-danger">
						
					</form>
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>
 
 <script>
 $(document).ready(function(){  
	$(document).on('click', '.editName', function(){
		var student_id = $(this).attr("ID");
		if(student_id!=''){
			$.ajax({
				url:"showStudent.php",
				method:"POST",
				data:{studentID:student_id},
				dataType:"json",
				success:function(data){
					$('#name').val(data.Name);
					$('#editNameModal').modal('show');
				}
			});
		}
	});
	
	$(document).on('click', '.editBday', function(){
		var student_id = $(this).attr("ID");
		if(student_id!=''){
			$.ajax({
				url:"showStudent.php",
				method:"POST",
				data:{studentID:student_id},
				dataType:"json",
				success:function(data){
					$('#bday').val(data.dateOfBirth);
					$('#editBdayModal').modal('show');
				}
			});
		}
	});
	
	$(document).on('click', '.editAddress', function(){
		var student_id = $(this).attr("ID");
		if(student_id!=''){
			$.ajax({
				url:"showStudent.php",
				method:"POST",
				data:{studentID:student_id},
				dataType:"json",
				success:function(data){
					$('#address').val(data.Address);
					$('#editAddressModal').modal('show');
				}
			});
		}
	});
	
	$(document).on('click', '.editPhonNum', function(){
		var student_id = $(this).attr("ID");
		if(student_id!=''){
			$.ajax({
				url:"showStudent.php",
				method:"POST",
				data:{studentID:student_id},
				dataType:"json",
				success:function(data){
					$('#pnum').val(data.phoneNumber);
					$('#editStudPhonNumModal').modal('show');
				}
			});
		}
	});
	
	$(document).on('click', '.editGuarName', function(){
		var student_id = $(this).attr("ID");
		if(student_id!=''){
			$.ajax({
				url:"showStudent.php",
				method:"POST",
				data:{studentID:student_id},
				dataType:"json",
				success:function(data){
					$('#name_g').val(data.guardianName);
					$('#editGNameModal').modal('show');
				}
			});
		}
	});
	
	$(document).on('click', '.editGuarAddress', function(){
		var student_id = $(this).attr("ID");
		if(student_id!=''){
			$.ajax({
				url:"showStudent.php",
				method:"POST",
				data:{studentID:student_id},
				dataType:"json",
				success:function(data){
					$('#address_g').val(data.guardianAddress);
					$('#editGuardianAddressModal').modal('show');
				}
			});
		}
	});
	
	$(document).on('click', '.editGuarPhonNum', function(){
		var student_id = $(this).attr("ID");
		if(student_id!=''){
			$.ajax({
				url:"showStudent.php",
				method:"POST",
				data:{studentID:student_id},
				dataType:"json",
				success:function(data){
					$('#pnum_g').val(data.guardianPhoneNumber);
					$('#editGuardianPnumModal').modal('show');
				}
			});
		}
	});
	
	$(document).on('click', '.editStatus', function(){
		var student_id = $(this).attr("ID");
		if(student_id!=''){
			$.ajax({
				url:"showStudent.php",
				method:"POST",
				data:{studentID:student_id},
				dataType:"json",
				success:function(data){
					$('#status').val(data.guardianStatus);
					$('#editGuardianStatusModal').modal('show');
				}
			});
		}
	});
		
 });



</script>