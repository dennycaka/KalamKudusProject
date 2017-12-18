<?php
	session_start();
	include 'connection.php';
	$query = "SELECT * FROM teachers";
	$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>My Teacher</title>
		
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
				<h1>Registered Teachers</h1>
				<br/>
				
				<div class="table-responsive">
					
					<div id="teacher_table">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th width="10%">Teacher ID</th>
									<th width="30%">Teacher Name</th>
									<th width="15%">Subject</th>
									<th width="15%">Phone Number</th>
									<th width="15%">View Profile</th>
						
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
										<td><?php echo $row["subject"];?></td>
										<td><?php echo $row["phoneNumber"];?></td>
										<td><input type="button" name="view" value="View Profile" id="<?php echo $row["ID"];?>" class="view_data btn btn-primary"/></td>
										
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
 
  
 <script>  
 
$(document).ready(function(){  
 
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
	
		
 });

 </script>


 