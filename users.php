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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="account.js" type="text/javascript"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/admin.css" rel="stylesheet">
    <title>Green Committee Administrator</title>
</head>

<body>
    <div id="wrapper">

        <nav class="navbar navbar-fixed-top">
            <div class="navbar-header">
<<<<<<< HEAD
                <a class="navbar-brand" href="admin.php">Welcome Administrator</a>
=======
                <a class="navbar-brand" href="users.php">Welcome Administrator</a>
>>>>>>> ee32dfd8f1b85bce42b14fa33c5d44b56b2702f2
            </div>

            <ul class="nav navbar-right top-nav">
                <li>
                    <a href="index.php">Logout</a>
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
                    <div class="col-lg-12">
                        <h1 class="page-header">Users</h1>
                    </div>

                    <div id='mainBod'>
                        <input type="text" id="input" placeholder="Search..." title="searching">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>StarID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                </tr>
                            </thead>

                             <tbody id="tab">
                              <?php
<<<<<<< HEAD
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
=======
                                $file = fopen("db/DB2.txt", "r");
                                $count = 0;
                                while(!feof($file)){
                                  $inform = fgets($file);
                                  $count++;
                                  list($starID, $name, $email, $role) = explode(':', $inform);
                                  ?>
                                  <tr>
                                    <td><?= $starID ?></td>
                                    <td><?= $name ?></td>
                                    <td><?= $email ?></td>
                                    <td><?= $role ?></td>
                                  </tr>
                                  <?php
                                  }
                                  fclose($file);
>>>>>>> ee32dfd8f1b85bce42b14fa33c5d44b56b2702f2
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
                    <img src="images/WSU_GreenFee.png">
                </div>
            </div>
        </div>
</body>

</html>
