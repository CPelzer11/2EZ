<!DOCTYPE html>
<html lang="en">

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
                <a class="navbar-brand" href="index.html">Welcome Administrator</a>
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
                    <li>
                        <a href="#">Profile</a>
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
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>StarID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th></th>
                                    <th></th>
                                  </tr>
                            </thead>

                             <tbody id="myTable">
                              <?php
                                $file = fopen("DB2.txt", "r");
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
                                    <td><a href="#">Profile</a></td>
                                    <td><a href="#">Remove</a></td>
                                  </tr>
                                  <?php
                                  }
                                  fclose($file);
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
