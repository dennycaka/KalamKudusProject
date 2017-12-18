<?php
	session_start();
	include 'connection.php';
	$query = "SELECT * FROM class";
	$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>My Schedule</title>
		
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
				<h1>My Schedule</h1>
				<br/>
				
				<div class="table-responsive">
					
					<div id="teacher_table">
						<table class="table table-bordered table-hover">
							<tr>
								<th width="18%">Day</th>
								<th width="15%">Period 1</th>
								<th width="15%">Period 2</th>
								<th width="15%">Period 3</th>
								<th width="15%">Period 4</th>
								<th width="15%">Period 5</th>
								
							</tr>
							<?php
								while($row = mysqli_fetch_array($result)){
									$name = $row["Name"];
			
									$query2 = "SELECT * FROM class$name WHERE studentID='".$_SESSION['uid']."'";
									$result2 = mysqli_query($conn, $query2);
			
									if($row2 = mysqli_fetch_array($result2)){
										$query3 = "SELECT * FROM schedule$name";
										$result3 = mysqli_query($conn, $query3);
				
										while($row3 = mysqli_fetch_array($result3)){
										?>
						
										<tr>  
											<td width="18%"><?php echo $row3["Day"]?></td>
											<td width="15%"><?php echo $row3["Period 1"]?></td>
											<td width="15%"><?php echo $row3["Period 2"]?></td>
											<td width="15%"><?php echo $row3["Period 3"]?></td>
											<td width="15%"><?php echo $row3["Period 4"]?></td>
											<td width="15%"><?php echo $row3["Period 5"]?></td>
										</tr> 
									<?php
										}
									
									}
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


  



 