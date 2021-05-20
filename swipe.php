<?php
    session_start();
    include 'includes/class-autoload.inc.php';

    if(empty($_SESSION['username'])){
        header("Location: login.php");
    }

    echo $_POST;

    //if (isset($_POST)){
    //    
    //    $users = new swipe();
    //    $users->insertfriend(); 
    //}

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
        <script src="./assets/jquery-3.6.0.min.js"></script>
    </head>

    <body>
        <?php include_once 'includes/header.php'?>

        <div class="allUsers">
            <?php 
                $users = new swipe();
                $users->grabsUsers();
            ?>
        </div>

        <p id="noMore"></p>

        <img class="bottomscreen" src="./images/bot.png" alt="bottom">
    </body>
    <script src="./js/swipe.js"></script>
</html> 
