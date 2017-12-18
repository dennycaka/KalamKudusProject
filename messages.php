<?php
	include 'connection.php';
	session_start();	
	
	$query= "SELECT * FROM message ORDER BY dateSent DESC";
	$result= mysqli_query($conn,$query);
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
				<h1>Messages from Students</h1>
				<br/>
				
				<div class="table-responsive">
					<div class="scroll" style="height:500px;">
						<div id="message_table">
							<table class="table table-bordered">
								<tr>
									<th width="15%">About</th>
									<th width="10%">Sender ID</th>
									<th width="25%">Sender Name</th>
									<th width="15%">View</th>
									<th width="15%">Reply</th>
									<th width="15%">Delete</th>
								</tr>
								<?php
									while($row = mysqli_fetch_array($result)){
									?>	
										<tr>
									
											<td><?php echo $row["About"];?></td>
											<td><?php echo $row["Sender"];?></td>
											<td> 
												<?php $id = $row["Sender"];
													$query2 = "SELECT * from students WHERE ID = '$id'";
													$result2 = mysqli_query($conn, $query2);
													$row2 = mysqli_fetch_array($result2);
													echo $row2["Name"];
												?>
											</td>
											<td><input type="button" name="view" value="View" id="<?php echo $row["ID"];?>" class="view_data btn btn-primary"/></td>
											<td><input type="button" name="reply" value="Reply" id="<?php echo $row["ID"];?>" class="reply_data btn btn-primary"/></td>
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
                    <h4 class="modal-about"></h4>  
                </div>  
                <div class="modal-body" id="message_detail">  
                </div>  
                <div class="modal-footer">  
                    
                </div>  
           </div>  
      </div>  
 </div>
 
  <div id="replyModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  	
					<h4 class="modal-title">Reply This Message</h4> 
                </div>  
                <div class="modal-body">  
					<form method="POST" action="addMessage.php">
						
					<label>Enter message</label>
					<textarea name="replyMessage" id="replyMessage" rows="5" class="form-control" required/></textarea>
					<br/>
						
					<textarea name="messageID" id="messageID" class="form-control" required/ style="display:none;"></textarea>
					<br/>
					
					<input type="submit" name="insert" id="insert" value="Send" class="btn btn-success"/>
					<input type="reset" class="btn btn-danger">
						
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
                    <h4 class="modal-title">Delete this message?</h4>  
                </div>  
                <div class="modal-body">  
					<input type="hidden" name="messageID" id="messageID"/>
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
        var message_id = $(this).attr("ID"); 
		if(message_id!=''){
			$.ajax({  
				url:"showMessage.php",  
				method:"post",  
				data:{message_id:message_id},
				dataType:"json",		
				success:function(data){  
					$('.modal-about').html(data.About);
					$('#dataModal').modal("show");  
				}  
			}); 
			$.ajax({  
				url:"viewMessage.php",  
				method:"post",  
				data:{message_id:message_id},  
				success:function(data){  
					$('#message_detail').html(data);  
					$('#dataModal').modal("show");  
				}  
			}); 
		}	 
	}); 
	
	$(document).on('click','.reply_data',function(){  
        var message_id = $(this).attr("ID"); 
		if(message_id!=''){
			$.ajax({  
				url:"showMessage.php",  
				method:"post",  
				data:{message_id:message_id},
				dataType:"json",		
				success:function(data){  
					$('#messageID').html(data.ID);
					$('#replyModal').modal("show");  
				}  
			}); 	
		}	 
	}); 
	
	$(document).on('click','.delete_data',function(e){  
		e.preventDefault();
		var message_id = $(this).attr("ID");
		$('#deleteModal').modal("show");
		$('#btnyes').click(function() {
			$.ajax({  
				url:"deleteMessages.php",
				method:"POST",  
				data:{messageID:message_id},  
				success:function(data){   
					$('#messageID').val(data.ID); 
				}  
			});
			$(location).attr('href','messages.php');
			$('#deleteModal').modal('hide');
		});
		
	});  
	

});	
</script>