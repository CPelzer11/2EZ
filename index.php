<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="index.js" type="text/javascript"></script>
  <link rel="stylesheet" href="bootstrap.css">
  <link rel="stylesheet" href="indexStyle.css">
  <title>Green Committee Page</title>
</head>

<body>
  <nav class="navbar navbar-toggleable-sm p-0">
    <div class="container">
      <a href="index.html" class="navbar-brand">Welcome Committee Member</a>
      <div class="navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="#" class="nav-link">Profile</a>
          </li>
          <li class="nav-item">
            <a href="login.php" class="nav-link">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header id="main-header" class="text-black">
    <div class="container">
      <div class="row">
        <div>
          <h1>Proposal Review</h1>
        </div>
      </div>
    </div>
  </header>
  <br>

  <!-- POSTS -->
  <section id="posts">
    <div class="container">
      <div class="row">
        
          <div class="card">
            <h4>Proposals</h4>
              <input type="text" id="myInput" placeholder="Search..." title="type in a proposal">
            <div class="card-header">
            </div>
            <table class="table table-striped">
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
                      <td><a href="forms.html" class="btn btn-secondary">Review</td>
                    </tr>
                    <?php
                    }
                    fclose($file);
                    ?>

              </tbody>
            </table>

              <div class="contentList">
                <?php
                $x = $count/2;
                $y = ceil($x);
                for($i = 1; $i < $y; $i++) {
                  ?>
                  <a href = ""><?= $i?></a>
                <?php
                }
                ?>
              </div>
          </div>
      </div>
    </div>
  </section>

  <!--
  <footer id="main-footer" class="bg-inverse mt-10 p-5">
    <div class="container">
      <div class="row">
      </div>
    </div>
  </footer>
-->
</body>
</html>
