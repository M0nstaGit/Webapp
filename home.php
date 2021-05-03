<?php
    session_start();

    if(empty($_SESSION['username'])){
        header("Location: login.php");
    }
?>
<!-- Homepage -->
<!-- Add functionality "check if user is loged in", if not logged in go to log/signin page -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome</title>
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/loadanimation.css">
        <link rel="shortcut icon" type="image/png" href="./images/sportbud.png">
    </head>

    <body>
        <?php include_once 'includes/header.php'?>

        <div class="wrapperwelcomemessage">
            <h1>Welcome, $Name!</h1>
            <h2>You sported for $Time hours this week</h2>
        </div>

        <!-- <div class="loadercontainer" id="hidediv">
            <span class="loader"><span class="loader-inner"></span></span>
        </div> -->

        <img class="bottomscreen" src="./images/bot.png" alt="bottom">
    </body>
</html>