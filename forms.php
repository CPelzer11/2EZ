<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
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
            
                $conn = new mysqli("localhost", "root", "", "WEBDB");
                    
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                
                    while ($count < 13)
                    {
                        $sql = "SELECT text FROM question WHERE id = " . $count;
                        
                        $result = $conn->query($sql);
                        
                        $out = $result->fetch_assoc();
                        
                        if($in){
                        echo
                        '<div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse' . $count .'">' . $out["text"] . '</a>
                                </h4>
                            </div>
                            <div id="collapse' . $count . '" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    information about stuff
                                        <div class="buttonContainer">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="chart-scale">
                                                        <button class="btn btn-scale btn-scale-desc-1">1</button>
                                                        <button class="btn btn-scale btn-scale-desc-2">2</button>
                                                        <button class="btn btn-scale btn-scale-desc-3">3</button>
                                                        <button class="btn btn-scale btn-scale-desc-4">4</button>
                                                        <button class="btn btn-scale btn-scale-desc-5">5</button>
                                                        <button class="btn btn-scale btn-scale-desc-6">6</button>
                                                        <button class="btn btn-scale btn-scale-desc-7">7</button>
                                                        <button class="btn btn-scale btn-scale-desc-8">8</button>
                                                        <button class="btn btn-scale btn-scale-desc-9">9</button>
                                                        <button class="btn btn-scale btn-scale-desc-10">10</button>
                                                    </div>
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
                                <div class="panel-body">
                                    information about stuff
                                        <div class="buttonContainer">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="chart-scale">
                                                        <button class="btn btn-scale btn-scale-desc-1">1</button>
                                                        <button class="btn btn-scale btn-scale-desc-2">2</button>
                                                        <button class="btn btn-scale btn-scale-desc-3">3</button>
                                                        <button class="btn btn-scale btn-scale-desc-4">4</button>
                                                        <button class="btn btn-scale btn-scale-desc-5">5</button>
                                                        <button class="btn btn-scale btn-scale-desc-6">6</button>
                                                        <button class="btn btn-scale btn-scale-desc-7">7</button>
                                                        <button class="btn btn-scale btn-scale-desc-8">8</button>
                                                        <button class="btn btn-scale btn-scale-desc-9">9</button>
                                                        <button class="btn btn-scale btn-scale-desc-10">10</button>
                                                    </div>
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
            <button href="login.html" value="GoBack" type="button">Go Back</button>
        </div>
    </body>
</html>