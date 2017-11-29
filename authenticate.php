	<?php 
		$dbconnect = mysqli_connect('localhost', 'root', '','cs344proj');
		$query = $dbconnect->prepare("SELECT u_name FROM user WHERE u_name=?");
		$query->bind_param("s",$username);//Prepare Query
		$username=$_POST["username"];
		$query->execute();
		$query->bind_result($u_name);
		$check=$query->fetch();//Check if query was successful
		if($check){ //If success, is valid user
			session_start(['cookie_lifetime'=>600]);
			$_SESSION['logged']=true;
			$query="SELECT id FROM user WHERE u_name='".$username."'";//if valid user, check if admin
			$result=$dbconnect->query($query);
			if($getid=$result->fetch_assoc()){
				$isadmin="SELECT user_id FROM admin WHERE user_id='".$getid["id"]."'";//compare user id of entered 
			}																		  //username
			$check=$dbconnect->query($isadmin);
			if($check->num_rows==1){//if we get a row back, match found, go to admin page
				header("Location: admin.php");
			}
			else{
				header("Location: index.php");//else go to committee member page
			}
		}
		else{//else, invalid user return to login screen
			session_start();
			$_SESSION['failed']="*Invalid Credentials";
			header("Location: login.php");
		}
		$dbconnect->close();
	?>