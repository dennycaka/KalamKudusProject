<?php
	session_start();
	include 'connection.php';
	$query = "SELECT * FROM class";
	$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>My Attendance</title>
		
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
			
			<button style="float:right; margin:40px;" type="button" name="changePassword" data-toggle="modal" data-target="#changePasswordModal" class="btn btn-info btn-custom">
				Change My Password
			</button>

		</header>

		<div id="container">

			<nav>
				<ul>
					<li><a href="studenthome.php"><img src="styles/image/icon1.png"><p>Dashboard</p></a></li>
					<li><a href="studentViewTeacher.php"><img src="styles/image/icon3.png"><p>Teachers</p></a></li>
					<li><a href="studentViewMarks.php"><img src="styles/image/icon5.png"><p>Marks</p></a></li>
					<li><a href="studentViewAttendance.php"><img src="styles/image/icon7.png"><p>Attendance</p></a></li>
					<li><a href="index.php"><img src="styles/image/icon6.png"><p>Log out</p></a></li>
				</ul>	
			</nav>

			<div class="content">
				<h1>My Attendance</h1>
				<br/>
				
				<div class="table-responsive">
					
					<div id="teacher_table">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th width="20%">Month</th>
									<th width="12%">Illness</th>
									<th width="12%">Vacation/trip</th>
									<th width="10%">Bereavement</th>
									<th width="10%">Unverified</th>
									<th width="10%">Lateness</th>
								</tr>
							</thead>
							<?php
								while($row = mysqli_fetch_array($result)){
									$name = $row["Name"];
			
									$query2 = "SELECT * FROM class$name WHERE studentID='".$_SESSION['uid']."'";
									$result2 = mysqli_query($conn, $query2);
			
									if($row2 = mysqli_fetch_array($result2)){
										
										$query3 = "SELECT * FROM attendance$name WHERE studentID='".$_SESSION['uid']."'";
										$result3 = mysqli_query($conn, $query3);
																			
										while($row3 = mysqli_fetch_array($result3)){
										?>
						
										<tr>  
											<td width="20%"><?php echo $row3["Month"]?></td>
											<td width="12%"><?php echo $row3["Illness"]?></td>
											<td width="12%"><?php echo $row3["Vacation"]?></td>
											<td width="10%"><?php echo $row3["Bereavement"]?></td>
											<td width="10%"><?php echo $row3["Unverified"]?></td>
											<td width="10%"><?php echo $row3["Lateness"]?></td>
										</tr> 
									<?php
										}
									
									}
								}
								?>
						</table>
					</div>
				</div>
				<br/>
			
			</div>
		</div>

		<footer class="footer-container">

		</footer>
	
	
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
	</body>
</html>

  <div id="changePasswordModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  	
					<h4 class="modal-title">Change Password</h4> 
                </div>  
                <div class="modal-body">  
					<form method="POST" action="change_studentPassword.php">
					
					<label>Enter old password</label>
					<input type="password" name="oldpass" id="oldpass" class="form-control" required/>
					<br/>
					
					<label>Enter new password</label>
					<input type="password" name="password" id="password" class="form-control" required/>
					<br/>
					
					<label>Confirm new password</label>
					<input type="password" name="password2" id="password2" class="form-control" required/>
					<br/>
					
					<input type="hidden" name="studentID" id="studentID"/>
					<input type="submit" value="Save" class="btn btn-success"/>
					<input type="reset" class="btn btn-danger">
						
					</form>
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>
 