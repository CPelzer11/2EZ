<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="index.js" type="text/javascript"></script>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="indStyle.css">
    <title>Green Committee Page</title>
  </head>

  <body>
    <nav class="navbar navbar-toggleable-sm p-1">
      <div class="container">
        <a href="index.php" class="navbar-brand">Welcome Committee Member</a>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="#" class="nav-link">Profile</a>
            </li>
            <li class="nav-item">
              <a href="login.php" class="nav-link">Logout</a>
            </li>
          </ul>
      </div>
    </nav>

    <header class="text-black pt-2 pl-5">
      <div class="container">
        <div class="row">
          <div>
            <h1 >Proposal Review</h1>
          </div>
        </div>
      </div>
    </header>
    <br>

    <main>
      <div class="container">
        <div class="row">
          <div class="col-md-9">
          <div class="card">
            <div class="card-block">
              <h4 class="text-center">Proposals</h4>
                <input type="text" id="myInput" placeholder="Search..." title="type in a proposal">
                  <table class="table table-hover">
                    <thead class="thead">
                      <tr>
                        <th>Title</th>
                        <th>Date Posted</th>
                        <th>Submitted by</th>
      				          <th></th>
                      </tr>
                    </thead>

                    <tbody id="myTable">
                      <?php
                        $file = fopen("DB.txt", "r");
                        $count = 0;
                        while(!feof($file)){
                          $inform = fgets($file);
                          $count++;
                          list($title, $date, $submit) = explode(':', $inform);
                          ?>
                          <tr>
                            <td><?= $title ?></td>
                            <td><?= $date ?></td>
                            <td><?= $submit ?></td>
                            <td><a href="forms.html" class="btn btn-secondary btn-outline-success" role="button">Review</td>
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
    </main>
  </body>
</html>
