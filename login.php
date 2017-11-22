<!DOCTYPE HTML>
<html>
	
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="login.js"></script>
        <title>Homepage</title>
    </head>
    <body>
		
        <div id="main">
        <img class="img-rounded img-responsive"src="images/banner.png" id="banner">
        <h1>Student Green Fee</h1>
        <form class="form-horizontal" method="post">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                Username:<input id="username" class="form-control" type="text" name="username" placeholder="StarID" onclick="setTimeout(admincheck, 10)">
                <br>
                <button formaction="authenticate.php" class="login" type="submit" value="login">Login</button>
                <button class="login" type="submit" value="admin">Login as Admin</button>
            </div>
        </form>
            <img src="images/WSU_GreenFee.png" id="greenFee" class="img-responsive">
            <?php session_start();?>
				<p id="test"> 
				<?php
				session_destroy();
				if(isset($_SESSION['failed'])){
					print($_SESSION['failed']);
				}
				?>
				</p>
			
        </div>
    </body>
</html>