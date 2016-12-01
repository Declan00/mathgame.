<?php
    session_start();
    extract($_POST);
    $correct = 0;
    $calculation = "";
    $error1 = "";
?>
<html lang="en">
    <head>
        <title>Cash Calculator</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/style/bootstrap.min.css" rel="stylesheet" media="screen">
        <script src="/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="/js/bootstrap.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="/style/style.css" type="text/css" />
        <meta charset="utf-8" />
    </head>
    <body>
        <hr />
        <div class="form-group">
            <div class="row">
                <p class="col-md-2"/>
                <div class="col-md-4">
                    <h2>math game</h2>
                </div>
                <div class="col-md-4">
                    <form class="oneLine logout" action="index.php" >
                    <input type="submit" value="Logout" name="Logout"/>
                    </form>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <p class="col-md-2"/>
                <div class="col-md-4">
                    <?php 
                        $rn1 = rand(0,20);
                        $rn2 = rand(0,20);
                        $rn3 = rand(0,1);
                        if ($rn3 == 0) {
                            $calculation = "+";
                        } else {
                            $calculation = "-";
                        }
                        echo $rn1 . $calculation . $rn2;
                    ?>
                    
                </div>
            </div>
        </div>
    <form action="mathGame.php" method="post">
        <div class="form-group">
            <div class="row">
                <label for="answer" class="control-label col-sm-1"></label>
                <div class="col-md-2">
                    <input placeholder="Enter Answer" type="text" name="answer" >
                <div class="col-md-8">
                </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <p class="col-md-2"/>
            <div class="col-md-2">
                <input type="submit" name="submit" value="Submit" />
            </div>
            </div>
        </div>
        <br />
        <hr />
        <div class="form-group">
            <div class="row">
                <p class="col-md-2"/>
                <div class="col-md-4">
                    <?php 
                        echo "<input type='hidden' name='number1' value='$rn1'/>";
                        echo "<input type='hidden' name='number2' value='$rn2'/>";
                        echo "<input type='hidden' name='operator'   value='$rn3'/>";
                        if (isset($_POST["answer"]) and is_numeric($_POST["answer"])) {
                            $_SESSION["times"] ++;
                            if ($_POST["operator"] == 0) {
                                $correct = $_POST["number1"] + $_POST["number2"];
                            } else {
                                $correct = $_POST["number1"] - $_POST["number2"];
                            }
                            if ($correct == $_POST["answer"]) {
                                $_SESSION["correcttimes"] ++;
                                echo "<p> Congratulation, You got the correct answer</p>";
                            } else {
                                echo "<p> Why you can't find out the correct answer</p>";
                            }
                        } else {
                            echo "<p> Please fill in the blank with an integer </p>";
                        } 
                    ?>
                    <?php 
                        echo "<p> Your Score:   " . $_SESSION["correcttimes"] . " / " . $_SESSION["times"] . "</p>";
                    ?>
                </div>
            </div>
        </div>
     </form>
    </body>
</html>