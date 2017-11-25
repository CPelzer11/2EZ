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
            <a href="login.html" class="nav-link">Logout</a>
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
					$dbconnect = mysqli_connect('localhost', 'x', 'x','x');
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
							<?php print($show["contact_name"]);?>
								</td>
								<td><a href="forms.html" class="btn btn-secondary">Review</td>
						<?php
							}//end while
							}//end if
							mysqli_close($dbconnect);
						?>
							</tr>
              </tbody>
            </table>

              <div class="contentList">
                <div class="left">Showing 1-4 of 10</div>
                  <div class="right">
                    <a href="#">Previous</a>
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    ...
                    <a href="#">Next</a>
                  </div>
                </div>
              </div>

              <!--
              <div id="sideBar">
                <div class="box">
                  <div class="boxHead">
                    <h2>Order By</h2>
                  </div>
                    <div class="boxContent">
                      <div class="sort">
                        <select class="field">
                          <option value="">Title</option>
                        </select>
                        <select class="field">
                          <option value="">Date</option>
                        </select>
                        <select class="field">
                          <option value="">Submitter</option>
                        </select>
                      </div>
                    </div>
                </div>
              </div>
            -->
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
