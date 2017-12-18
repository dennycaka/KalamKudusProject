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
					<li><a href="index.php"><img src="styles/image/icon6.png"><p>Log out</p></a></li>
				</ul>	
			</nav>

			<div class="content">
				
				<h1>Welcome, 
					<?php 
				
						$query = "SELECT * FROM users WHERE studentID = '".$_SESSION['uid']."'"; 
						$result = mysqli_query($conn, $query); 
						$row = mysqli_fetch_array($result); 
						
						echo $row['studentName']; 
					?>
				</h1>
				
				<div class="box">
					<a href="studentProfile.php"><img src="styles/image/s1.png" class="panel"><h5 style="left:30px;">View my profile</h5></a>
				</div>

				<div class="box2">
					<a href="studentViewAnnouncement.php"><img src="styles/image/a1.png" class="panel"><h5>View announcement</h5></a>
				</div>

				<div class="box3">
					<a href="studentWriteMessage.php"><img src="styles/image/t2.png" class="panel"><h5 style="left:30px;">Write messages</h5></a>
				</div>
				
				<div class="box4">
					<a href="studentViewSchedule.php"><img src="styles/image/c2.png" class="panel"><h5>View schedule</h5></a>
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