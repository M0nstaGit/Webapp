<?php
    session_start();
    include 'includes/class-autoload.inc.php';

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
        <script src="./js/swipe.js"></script>
    </head>

    <body>
        <?php include_once 'includes/header.php'?>

        <?php 
            // $users = new swipe();
            // $users->grabsUsers();
        ?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <button onclick="getLocation()">Try It</button>
        <p id="demo"></p>
        <p>test</p>
        <img class="bottomscreen" src="./images/bot.png" alt="bottom">
    </body>
    
</html>