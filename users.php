<!DOCTYPE html>
<html lang="en">
<?php
	session_start();
	if(!$_SESSION['admin']){
	header("Location: index.php");
}
?>
<head>
    <meta charset="utf-8">
    <title>Green Committee Administrator</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="index.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="admin.css" rel="stylesheet">
</head>

<body>
    <div id="wrapper">

        <nav class="navbar navbar-fixed-top">
            <div class="navbar-header">
                <a class="navbar-brand" href="admin.php">Welcome Administrator</a>
            </div>

            <ul class="nav navbar-right top-nav">
                <li>
                    <a href="login.php">Logout</a>
                </li>
            </ul>

            <div class="collapse navbar-collapse">
                <ul id="sideNav" class="nav navbar-nav side-nav">
                    <li>
                        <a href="admin.php">Proposal Reviews</a>
                    </li>
                    <li> 
                        <a href="users.php">Users</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Users</h1>
                    </div>

                    <div id='mainBod'>
                        <input type="text" id="myInput" placeholder="Search..." title="searching">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>StarID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                  </tr>
                            </thead>

                             <tbody id="myTable">
                              <?php
                                $dbconnect = mysqli_connect('localhost', 'root', '','cs344proj');
                                $find = "SELECT id,u_name,email,status From user;";
                                $result= mysqli_query($dbconnect, $find);
                                 if(mysqli_num_rows($result)>0){
                                    while($project = mysqli_fetch_assoc($result)){
                                    $count = 0;
                                     echo '
                                      <tr>
                                        <td>' . $project["id"] . '</td>
                                        <td>' . $project["u_name"] . '</td>
                                        <td>' . $project["email"] . '</td>
                                        <td>' . $project["status"] . '</td>
                                      </tr>';
                                    }
                                 }
                                  ?>
                            </tbody>
                        </table>

                        <div class="pagination">
                            <ul class="pagination">
                              <?php
                                $x = $count/2;
                                $y = ceil($x);
                                for($i = 1; $i < $y; $i++) {
                              ?>
                                  <li class="page-item"><a class="page-link" href = ""><?= $i?></a></li>
                              <?php
                                }
                              ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
