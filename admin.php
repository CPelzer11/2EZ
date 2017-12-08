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
              <div class="col-lg-12">
                  <h1 class="page-header">Proposal Reviewed</h1>
              </div>

                    <div>
                        <input type="text" id="input" placeholder="Search..." title="searching">
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

                             <tbody id="tab">
                              <?php

                                $dbconnect = mysqli_connect('localhost', 'root', '','cs344proj');
                                $find = "SELECT distinct title, contact_name, r_name, advisor_name, amount 
                                FROM project inner join review 
                                WHERE id = project_id ;";
								
                                $result= mysqli_query($dbconnect, $find);
                                 if(mysqli_num_rows($result)>0){
                                    while($project = mysqli_fetch_assoc($result)){
										$title=str_replace(' ', '%20', $project["title"]);
										$reviewer=$project["r_name"];
										$link="reviews.php?title=".$title."&r_name=".$reviewer;
                                    $count = 1;
                                     echo '
                                      <tr>
                                        <td>' . $project["title"] . '</td>
                                        <td>' . $project["contact_name"] . '</td>
                                        <td>' . $project["advisor_name"] . '</td>
                                        <td>' . $project["amount"] . '</td>
                                        <td>' . $project["r_name"] . '</td>
										<td><a href="'.$link.'">Open</a></td>
                                      </tr>';
                                    }
                                 }
								?>
                            </tbody>
                        </table>

                        <div class="pagination">
                            <ul class="pagination">
                              <?php
                                $x = 4/2;
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
