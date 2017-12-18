<?php
	include 'connection.php';
	session_start();	
	
	$query= "SELECT * FROM message WHERE sender='".$_SESSION['uid']."' ORDER BY dateSent DESC";
	$result= mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Messages</title>
		
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
				
				<h2>Write Message or Question</h2>
				<br/>
				
				<form action = "addMessage.php" method = "POST" style="padding-top:10px;">
				<div class = "form-group">
					<div class="form-group row">
						<div class="col-4">
							<label>About:</label>
							<input type="text" name="about" id="about" class="form-control" required />
						</div>
						<div class="col-4">
							<label>Date Sent:</label>
							<input type="date" name="dateS" id="dateS" class="form-control" value="<?php echo date('Y-m-d');?>" required />
						</div>	
					</div>
					<label>Message/Question:</label>
					<textarea name="message" id="message" rows="3" class="form-control" required></textarea>
				
					<br/>
					<input type="hidden" name="sender" id="sender" value="<?php echo $_SESSION['uid'];?>"/>
					<input type="hidden" name="messageID" id="messageID"/>
					<input type="submit" name="posting" id="posting" value="Send" class="btn btn-success"/>
					<input type="reset" class="btn btn-danger"/>
				</div>
				</form>
				
				<div class="table-responsive">
					<div class="scroll">
						<div id="message_table">
							<table class="table table-bordered table-hover">
								<tr>
									<th width="15%">About</th>
									<th width="15%">Date Sent</th>
									<th width="15%">View Message</th>
								</tr>
								<?php
									while($row = mysqli_fetch_array($result)){
									?>	
										<tr>
											<td><?php echo $row["About"];?></td>
											<td><?php echo $row["dateSent"];?></td>
											<td><input type="button" name="view" value="View Message" id="<?php echo $row["ID"];?>" class="view_data btn btn-primary"/></td>
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
	
});
</script>
