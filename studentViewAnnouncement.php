<?php
	include 'connection.php';
	session_start();	
	
	$query= "SELECT * FROM announcement ORDER BY datePosted DESC";
	$result= mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Announcements</title>
		
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
				
				<h1>Newest Announcements</h1>
				</br>
				<div class="table-responsive">
					<div class="scroll" style="height:550px;">
						<div id="announcement_table">
							<table class="table table-bordered table-hover">
								<tr>
									<th width="55%">Title</th>
									<th width="15%">Date Posted</th>
									<th width="15%">View</th>
								
								</tr>
								<?php
									while($row = mysqli_fetch_array($result)){
									?>	
										<tr>
									
											<td><?php echo $row["Title"];?></td>
											<td><?php echo $row["datePosted"];?></td>
											<td><input type="button" name="view" value="View" id="<?php echo $row["ID"];?>" class="view_data btn btn-primary"/></td>
										
											
										</tr>
									<?php
									}
									
								?>
						</div>
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
                    <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="announcement_detail">  
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>
 
 <script> 
$(document).ready(function(){  
  $(document).on('click','.view_data',function(){  
        var announcement_id = $(this).attr("ID"); 
		if(announcement_id!=''){
			$.ajax({  
				url:"showAnnouncement.php",  
				method:"post",  
				data:{announcement_id:announcement_id},
				dataType:"json",		
				success:function(data){  
					$('.modal-title').html(data.Title);
					$('#dataModal').modal("show");  
				}  
			}); 
			$.ajax({  
				url:"viewAnnouncement.php",  
				method:"post",  
				data:{announcement_id:announcement_id},  
				success:function(data){  
					$('#announcement_detail').html(data);  
					$('#dataModal').modal("show");  
				}  
			}); 
		}	 
	});
});
</script>