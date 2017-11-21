	<?php 
		unset($_SESSION['failed']);
		$dbconnect = mysqli_connect('localhost', 'Enter SQL Username Here', 'Enter SQL PW here','Enter DB name here');
		$query = $dbconnect->prepare("SELECT u_name FROM user WHERE u_name=?");
		$query->bind_param("s",$username);
		$username=$_POST["username"];
		$query->execute();
		$query->bind_result($u_name);
		$check=$query->fetch();
		if($check){
			header("Location: index.html");
		}
		else{
			session_start();
			$_SESSION['failed']="*Invalid Credentials";
			header("Location: login.php");
		}
		$query->close();
	?>