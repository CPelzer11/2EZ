	<?php 
		$dbconnect = mysqli_connect('localhost', 'insert SQL Username Here', 'insert SQL PW here','Insert DB name here');
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
			header("Location: login.html");
		}
		$query->close();
	?>