<!DOCTYPE HTML>
<?php
	session_start();
	if(!$_SESSION['logged']){
		header("Location: index.php");
	}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="forms.js"></script>
        <script src="/js/foundation.min.js"></script>
        <title>Questionaire</title>
    </head>
    <body>
        <div id="main">
            <img class="img-rounded img-responsive"src="images/banner2.png" id="banner">
                <div id="acordian" class="container">                
                    <h2>Review</h2>
                    <div class="panel-group" id="accordion">

                    <?php
                        $count = 1;
                        $in = true;

                        $conn = mysqli_connect('localhost', 'root', '','cs344proj');

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            while ($count < 13)
                            {
                                $sql = "SELECT text FROM question WHERE id = " . $count;

                                $result = $conn->query($sql);

                                $out = $result->fetch_assoc();

                                if($count<10){
                                    $query=$conn->prepare("Select answer, project_id from answer where question_id='00".$count."' and project_id=(select id from project where title=? and contact_name=?)");
                                }
                                else{
                                    $query=$conn->prepare("Select answer, project_id from answer where question_id='0".$count."' and project_id=(select id from project where title=? and contact_name=?)");
                                }
                                $query->bind_param("ss",$title, $name);
                                $title=$_GET["title"];
                                $name=$_GET["contact_name"];
                                
                                $query->execute();
                                $query->bind_result($col_title, $col_name);
                                $check=$query->fetch();
                                if($check){
                                if($count<10){
                                    $query="Select answer, project_id from answer where question_id='00".$count."' and project_id=(select id from project where title='".$title."' and contact_name='".$name."')";
                                    $answers=$conn->query($query);
                                    $answerout=$answers->fetch_assoc();
                                    $_SESSION["project_id"] = $answerout["project_id"];
                                }
                                else{
                                    $query="Select answer, project_id from answer where question_id='0".$count."' and project_id=(select id from project where title='".$title."' and contact_name='".$name."')";
                                    $answers=$conn->query($query);
                                    $answerout=$answers->fetch_assoc();
                                    $_SESSION["project_id"] = $answerout["project_id"];
                                }
                                }
                                else{
                                    header("Location: reviwer.php");
                                }
                                if($in){
                                echo
                                '<div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse' . $count .'">' . $out["text"] . '</a>
                                        </h4>
                                    </div>
                                    <div id="collapse' . $count . '" class="panel-collapse collapse in">
                                        <h4 class="answer"> '. $answerout["answer"] . ' 
                                        </h4>
                                        <div class="panel-body">
                                            <textarea name="ta' . $count . '" oninput="textarea('.$count.')" id="textarea' . $count . '" rows="4" cols="50" placeholder="Questions or Comments" autofocus></textarea>
                                                <div class="buttonContainer">
                                                    <div class="row">	
                                                        <div class="col-xs-12">
                                                            <div class="chart-scale">';
                                                                $count2 = 1;
                                                                while($count2 < 11){
                                                                echo '<input name="button' . $count .'" type="button" onclick="button(' . $count2 . ',' . $count . ')" class="btn btn-scale btn-scale-desc-' . $count2 . '" value = "' . $count2 . '">';
                                                                $count2 = $count2 + 1;
                                                                }
                                                            echo
                                                            '</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';

                                $in = false;
                            }

                            else{
                                echo
                                '<div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse' . $count .'">' . $out["text"] . '</a>
                                        </h4>
                                    </div>
                                    <div id="collapse' . $count . '" class="panel-collapse collapse">
                                        <h4 class="answer"> '. $answerout["answer"] . ' 
                                        </h4>
                                        <div class="panel-body">
                                            <textarea oninput="textarea('.$count.')" id="textarea' . $count . '" rows="4" cols="50" placeholder="Questions or Comments"></textarea>
                                                <div class="buttonContainer">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <div class="chart-scale">';
                                                                $count2 = 1;
                                                                while($count2 < 11){
                                                                echo '<input name="button' . $count . '" type="button" onclick="button(' . $count2 . ',' . $count . ')" class="btn btn-scale btn-scale-desc-' . $count2 . '" value = "' . $count2 . '">';
                                                                $count2 = $count2 + 1;
                                                                }
                                                            echo
                                                            '</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                            }
                                $count = $count + 1;


                        }

                    ?>

                        
                 </div>

             </div>
            <form action="confirmation.php" method="post">
            <?php
                
                $i = 1;
                while($i < 13) {
                     
                    echo '<input id="text' . $i . '" name="text' . $i . '" type="hidden" value="default">
                        <input id="button' . $i . '" name="button' . $i . '" type="hidden" value="default">';
                $i = $i + 1;
                }
            ?>

            </div>
            
             </div>
            <table>
                <tr>
                    <td>
                        <a href="index.php" class="btn btn-secondary">Logout</a>
                    </td>
                    <td>
                        <a href="confirmation.php" class="btn btn-secondary">Submit</a>
                    </td>
                </tr>
            </table>

                <input type="submit" id="submit">
            </form>
        </div>
    </body>
</html>