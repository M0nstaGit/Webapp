<?php
    session_start();

    if(empty($_SESSION['username'])){
        header("Location: login.php");
    }
?>
<!-- Swipe page -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Swipe</title>
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/loadanimation.css">
        <link rel="shortcut icon" type="image/png" href="./images/sportbud.png">
    </head>

    <body>
        <?php include_once 'includes/header.php'?>

        <div class="wrapperwelcomemessage">
            <h1>Swiping functionality still needs to be added</h1>
        </div>

        <img class="bottomscreen" src="./images/bot.png" alt="bottom">
    </body>
</html>