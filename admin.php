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
    <script src="account.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="css/admin.css" rel="stylesheet">
</head>

<body>
    <div id="wrapper">

        <nav class="navbar navbar-fixed-top">
            <div class="navbar-header">
                <a class="navbar-brand" href="admin.php">Welcome Administrator</a>
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
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Proposal Reviewed</h1>
                    </div>

                    <div>
                        <input type="text" id="myInput" placeholder="Search..." title="searching">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Title of Proposal</th>
                                    <th>Posted by</th>
                                    <th>Advised by</th>
                                    <th>Budget Amount</th>
                                    <th>Reviewed by</th>
                                  </tr>
                            </thead>

                             <tbody id="myTable">
                              <?php
<<<<<<< HEAD
                                $dbconnect = mysqli_connect('localhost', 'root', '','cs344proj');
                                $find = "SELECT distinct title, contact_name, r_name, advisor_name, amount 
                                FROM project natural join review 
                                WHERE id = project_id ;";
                                $result= mysqli_query($dbconnect, $find);
                                 if(mysqli_num_rows($result)>0){
                                    while($project = mysqli_fetch_assoc($result)){
                                    $count = 1;
                                     echo '
                                      <tr>
                                        <td>' . $project["title"] . '</td>
                                        <td>' . $project["contact_name"] . '</td>
                                        <td>' . $project["advisor_name"] . '</td>
                                        <td>' . $project["amount"] . '</td>
                                        <td>' . $project["r_name"] . '</td>
                                      </tr>';
                                    }
                                 }
=======
                                $file = fopen("db/DB1.txt", "r");
                                $count = 0;
                                while(!feof($file)){
                                  $inform = fgets($file);
                                  $count++;
                                  list($title, $datePost, $postBy, $dateRev, $revBy) = explode(':', $inform);
                                  ?>
                                  <tr>
                                    <td><?= $title ?></td>
                                    <td><?= $datePost ?></td>
                                    <td><?= $postBy ?></td>
                                    <td><?= $dateRev ?></td>
                                    <td><?= $revBy ?></td>
                                    <td><a href="#">Open</tdy>
                                    <td><a href="#">Delete</td>
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
                </div>
            </div>
        </div>
    </div>
</body>

</html>
