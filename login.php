<?php
	session_start();
	include 'connection.php';

	$uid = $_POST['uid'];
	$pwd = md5($_POST['pwd']);
	
	$sql = "SELECT * FROM users WHERE password = '$pwd' AND adminID = '$uid' OR password = '$pwd' AND studentID = '$uid'" ;
	
	
	
	$result= $conn->query($sql);
	
	if(!$row = mysqli_fetch_assoc($result)){
		echo "<script>alert('Your user ID or password is incorrect!');location.href='index.php';</script>";
		
	}else{
		
		
		if($row['Status']=="admin"){
			$name;
			$_SESSION['uid'] = $row['adminID'];
			$_SESSION['pwd'] = $row['password'];
			$_SESSION['name']=$row['adminName'];
			header("Location: adminhome.php");
		}
		else{
			$name;
			$_SESSION['uid'] = $row['studentID'];
			$_SESSION['pwd'] = $row['password'];
			$_SESSION['name']=$row['studentName'];
			header("Location: studenthome.php");
		}
	}
?>