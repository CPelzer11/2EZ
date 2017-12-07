<!DOCTYPE HTML>
<html>
<?php
	session_start();
	if(!$_SESSION['logged']){
	header("Location: index.php");
}
?>
	
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="login.js"></script>
        <title>Confirmation</title>
    </head>
    <body>
		
        <div id="main">
            <img class="img-rounded img-responsive"src="images/banner2.png" id="banner">
            <h1>Successful Submission!</h1>
            <h4 id="submission">Your evaluation has been successfully submitted, would you like to fill out another?</h4>
            <table>
                <tr>
                    <td>
                        <a href="index.php" class="btn btn-secondary">Logout</a>
                    </td>
                    <td>
                        <a href="account.php" class="btn btn-secondary">Home</a>
                    </td>
                </tr>
            </table>
            <img src="images/WSU_GreenFee.png" id="greenFee" class="img-responsive">
    
        </div>
    </body>
</html>