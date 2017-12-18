<?php
	include 'connection.php';
	session_start();	
	
	$query= "SELECT * FROM announcement ORDER BY datePosted DESC";
	$result= mysqli_query($conn,$query);
					
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Announcement</title>
		
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
				
				<h2>Add Announcement for Students</h2>
				<button style="float:right;margin-top:-30px;" type="button" name="deleteAll" id="deleteAll" data-toggle="modal" data-target="#deleteAllModal" class="btn btn-primary delete_all">Delete All Announcement</button>
				<br/>
				
				<form action = "addAnnouncement.php" method = "POST" style="padding-top:10px;">
				<div class = "form-group">
					<div class="form-group row">
						<div class="col-4">
							<label>Insert Title:</label>
							<input type="text" name="title" id="title" class="form-control" required />
						</div>
						<div class="col-4">
							<label>Date Posted:</label>
							<input type="date" name="dateP" id="dateP" class="form-control" value="<?php echo date('Y-m-d');?>" required />
						</div>	
					</div>
					<label>Insert Announcement:</label>
					<textarea name="announcement" id="announcement" rows="3" class="form-control" required></textarea>
				
					<br/>
					<input type="submit" name="posting" id="posting" value="Submit" class="btn btn-success"/>
					<input type="reset" class="btn btn-danger"/>
				</div>
				</form>
				
				
				
				<div class="table-responsive">
					<div class="scroll">
						<div id="announcement_table">
							<table class="table table-bordered">
								<tr>
									<th width="55%">Title</th>
									<th width="15%">View</th>
									<th width="15%">Delete</th>
								</tr>
								<?php
									while($row = mysqli_fetch_array($result)){
									?>	
										<tr>
									
											<td><?php echo $row["Title"];?></td>
											<td><input type="button" name="view" value="View" id="<?php echo $row["ID"];?>" class="view_data btn btn-primary"/></td>
											<td><input type="button" name="delete" value="Delete" id="<?php echo $row["ID"];?>" class="delete_data btn btn-primary"/></td>
											
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

  <div id="deleteAllModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    <h4>Delete all announcements?</h4>  
                </div>  
                <div class="modal-body">  
					<form method="POST" action="deleteAllAnnouncement.php">
					<input type="submit" value="Yes" id="btnyes2" class="btn btn-success btnyes" id="btnyes"/>
					<input type="submit" value="No" class="btn btn-danger" data-dismiss="modal"/>
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
                    <h4 class="modal-title">Delete this announcement?</h4>  
                </div>  
                <div class="modal-body">  
					<input type="hidden" name="announcementID" id="announcementID"/>
					<input type="submit" value="Yes" class="btn btn-success btnyes" id="btnyes"/>
					<input type="submit" value="No" class="btn btn-danger" data-dismiss="modal"/>
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
	
	$(document).on('click','.delete_data',function(e){  
		e.preventDefault();
		var announcement_id = $(this).attr("ID");
		$('#deleteModal').modal("show");
		$('#btnyes').click(function() {
			$.ajax({  
				url:"deleteAnnouncement.php",
				method:"POST",  
				data:{announcementID:announcement_id},  
				success:function(data){   
					$('#announcementID').val(data.ID); 
				}  
			});
			$(location).attr('href','editAnnouncement.php');
			$('#deleteModal').modal('hide');
		});
		
	}); 
	
	$(document).on('click','.delete_all',function(e){  
		e.preventDefault();
		var announcement_id = $(this).attr("ID");
		$('#deleteAllModal').modal("show");
		$('#btnyes2').click(function() {
			$.ajax({  
				url:"deleteAllAnnouncement.php",
				method:"POST",  
				data:{announcementID:announcement_id},  
				success:function(data){   
					$('#announcementID').val(data.ID); 
				}  
			});
			$(location).attr('href','editAnnouncement.php');
			$('#deleteModal').modal('hide');
		});
		
	}); 
});	
</script>