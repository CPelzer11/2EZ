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
			
			$query="SELECT * FROM user WHERE u_name='".$username."'";//if valid user, check if admin
			$result=$dbconnect->query($query);
			if($user=$result->fetch_assoc()){
				$isadmin="SELECT user_id FROM admin WHERE user_id='".$user["id"]."'";//compare user id of entered 
			}																		  //username
			$check=$dbconnect->query($isadmin);
			if($check->num_rows==1){//if we get a row back, match found, go to admin page
				$_SESSION['admin']=true;
                $_SESSION['r_id']=$user['id'];
                $_SESSION['r_name']=$user['u_name'];
                $_SESSION['r_affiliation']=$user['campus_affiliation'];
				header("Location: admin.php");
			}
			else{
				$_SESSION['logged']=true;
                $_SESSION['r_id']=$user['id'];
                $_SESSION['r_name']=$user['u_name'];
                $_SESSION['r_affiliation']=$user['campus_affiliation'];
				header("Location: reviewer.php");//else go to committee member page
			}
		}
		else{//else, invalid user return to login screen
			session_start();
			$_SESSION['failed']="*Invalid Credentials";
			header("Location: index.php");
		}
		$dbconnect->close();
	?>