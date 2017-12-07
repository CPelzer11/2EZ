<!DOCTYPE html>
<html lang="en">
<?php
	session_start();
	if(!$_SESSION['logged']){
	header("Location: index.php");
}
?>
  <head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="account.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/accStyle.css">
    <title>Green Committee Page</title>
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-toggleable-sm p-1">
      <div class="container">
        <a href="index.php" class="navbar-brand">Welcome Committee Member</a>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="#" class="nav-link">Profile</a>
            </li>
            <li class="nav-item">
              <a href="index.php" class="nav-link">Logout</a>
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
                <input type="text" id="myInput" placeholder="Search..." title="searching">
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
                        $dbconnect = mysqli_connect('localhost', 'root', '','cs344proj');
                        $find = "SELECT title, contact_name FROM project;";
                        $result= mysqli_query($dbconnect, $find);
                        if(mysqli_num_rows($result)>0){
                          while($show = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                              <td>
                            <?php print($show["title"]);?>
                              </td>
                              <td>12.09.16</td>
                              <td>
                            <?php print($show["contact_name"]);
						  $title= str_replace(' ', '%20', $show["title"]);
								  $contact=str_replace(' ', '%20', $show["contact_name"])	;
								  $link="forms.php?title=".$title."&contact_name=".$contact;
							?>
                              </td>

                              <td><a href=<?php print($link)?> class="btn btn-secondary btn-outline-success" role="button">Review</a></td>

                           <?php  
                          
                            }//end while
                            }//end if
                            mysqli_close($dbconnect);
                          ?>
                     </tr>
                    </tbody>
            </table>

              <div class="pagination">
                    <ul class="pagination">
                      <?php
						$count=4;	 
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