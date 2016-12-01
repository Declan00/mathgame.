<?php 
    session_start();
$error = "";
if (isset($_POST["email"])) {
//    echo $_POST["email"];
    if (($_POST["email"] == "a@a.a") and ($_POST["Password"] == "aaa")) {
        header("Location: mathGame.php");
        die();
    } else {
        $error = "Incorrect Email or Passward";
    }
}

if (isset($_POST["Logout"])) {
    $_SESSION["correcttimes"] = 0;
    $_SESSION["times"] = 0;
}

?>
<html lang="en">
    <head>
        <title>Cash Calculator</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/style/bootstrap.min.css" rel="stylesheet" media="screen">
        <script src="/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="/js/bootstrap.min.js" type="text/javascript"></script>
        <meta charset="utf-8" />
    </head>
    <body>
        <hr />
        <div class="form-group">
            <div class="row">
                <p class="col-sm-1"/>
                <div class="col-sm-3">
                    <h2>Log in to play the game</h2>
                </div>
            </div>
        </div>
    <form action="index.php" method="post">
        <div class="form-group">
            <div class="row">
                <label for="email" class="control-label col-sm-1"></label>
                <div class="col-sm-1">
                    Email:<input placeholder="Enter Email" type="email" name="email" size="form-control input-sm" />
                    <span class="error"></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="answer" class="control-label col-sm-1"></label>
                <div class="col-sm-1">
                    Passward<input placeholder="Enter Password" type="password" name="Password" size="form-control input-sm" />
                    <span class="error"></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <p class="col-sm-1"/>
            <div class="col-sm-1">
                <input type="submit" name="submit" value="Login" />
            </div>
            <div class="col-sm-2" style="color: red">
                <?php 
                echo "<p>" . $error . "</p> ";
                session_destroy();
                ?>
            </div>
            </div>
        </div>
     </form>
    </body>
</html>