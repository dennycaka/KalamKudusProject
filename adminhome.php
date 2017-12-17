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
				
				<h1>Welcome, 
					<?php 
				
						$query = "SELECT * FROM users WHERE adminID = '".$_SESSION['uid']."'"; 
						$result = mysqli_query($conn, $query); 
						$row = mysqli_fetch_array($result); 
						
						echo $row['adminName']; 
					?>
				</h1>
				
				<div class="box">
					<a href="editAdmin.php"><img src="styles/image/d1.png" class="panel"><h5>View admin</h5></a>
				</div>

				<div class="box2">
					<a href="editAnnouncement.php"><img src="styles/image/d3.png" class="panel"><h5>Add announcement</h5></a>
				</div>

				<div class="box3">
					<a href="messages.php"><img src="styles/image/d4.png" class="panel"><h5>Messages</h5></a>
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