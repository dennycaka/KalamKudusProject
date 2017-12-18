<?php
	session_start();
	include 'connection.php';
	$query = "SELECT * FROM class";
	$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>My Marks</title>
		
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
				<h1>My Marks</h1>
				<br/>
				
				<div class="table-responsive">
					
					<div id="teacher_table">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th width="20%">Subject</th>
									<th width="12%">Assigment 1</th>
									<th width="12%">Assigment 2</th>
									<th width="10%">Test 1</th>
									<th width="10%">Test 2</th>
									<th width="10%">Test 3</th>
									<th width="15%">Final Exam</th>
						
								</tr>
							</thead>
							<?php
								while($row = mysqli_fetch_array($result)){
									$name = $row["Name"];
			
									$query2 = "SELECT * FROM class$name WHERE studentID='".$_SESSION['uid']."'";
									$result2 = mysqli_query($conn, $query2);
			
									if($row2 = mysqli_fetch_array($result2)){
										
										$halaman = 8;
										$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
										$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
										$query3 = "SELECT * FROM marks$name WHERE studentID='".$_SESSION['uid']."'";
										$result3 = mysqli_query($conn, $query3);
										$total = mysqli_num_rows($result3);
										$pages = ceil($total/$halaman);     
										$query4 = "SELECT * FROM marks$name WHERE studentID='".$_SESSION['uid']."' LIMIT $mulai, $halaman";
										$result4 = mysqli_query($conn, $query4);										
										
										while($row4 = mysqli_fetch_array($result4)){
										?>
						
										<tr>  
											<td width="20%"><?php echo $row4["subject"]?></td>
											<td width="12%"><?php echo $row4["assignment1"]?></td>
											<td width="12%"><?php echo $row4["assignment2"]?></td>
											<td width="10%"><?php echo $row4["test1"]?></td>
											<td width="10%"><?php echo $row4["test2"]?></td>
											<td width="10%"><?php echo $row4["test3"]?></td>
											<td width="15%"><?php echo $row4["finalExam"]?></td>
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

 