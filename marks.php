<?
	session_start();	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		
		<link rel="stylesheet" type="text/css" href="styles/home.css"/>
		<link rel="stylesheet" type="text/css" href="styles/font-awesome.css"/>
		<link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700" rel="stylesheet">
	</head>
	<body>
		<header>
			<div class="logo">
				<img src="styles/image/logo.png">
			</div>
			<h1>Kalam Kudus Information System</h1>

			<div class="search-wrapper">
				<input type="text" placeholder="Enter user ID..." class="search-box">
				<button type="submit" class="search-button"><i class="fa fa-search" aria-hidden="true"></i></button>
			</div>
		</header>

		<div id="container">

			<nav>
				<ul>
					<li><a href="adminhome.php"><img src="styles/image/icon1.png"><p>Dashboard</p></a></li>
					<li><a href="student.php"><img src="styles/image/icon2.png"><p>Students</p></a></li>
					<li><a href="teacher.php"><img src="styles/image/icon3.png"><p>Teachers</p></a></li>
					<li><a href="class.php"><img src="styles/image/icon4.png"><p>Class</p></a></li>
					<li><a href="marks.php"><img src="styles/image/icon5.png"><p>Marks</p></a></li>
					<li><a href="index.php"><img src="styles/image/icon6.png"><p>Log out</p></a></li>
				</ul>	
			</nav>

			<div class="content">
				
				<h1>Marks Menu</h1>
				
				<div class="box">
					<a href="newadmin.php"><img src="styles/image/m1.png" class="panel"><h3>Add new marks</h3></a>
				</div>

				<div class="box2">
					<a href="#"><img src="styles/image/s2.png" class="panel"><h3 style="left:55px;">Edit marks</h3></a>
				</div>

				<div class="box3">
					<a href="#"><img src="styles/image/c4.png" class="panel"><h3 style="left:55px;">View marks</h3></a>
				</div>

			</div>
			<footer class="footer-container">

			</footer>
		</div>

		
	</body>
</html>