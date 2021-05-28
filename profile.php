<?php
    include 'includes/class-autoload.inc.php';
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
            <!-- <h1>Welcome, $Name!</h1> -->
            <?php 
            $Name = $_SESSION['username'];
            echo "<h1>Hi, $Name!</h1>";
            ?>

            <h2>These are your account details</h2>

            <?php
                $userobj = new user();
                $data = $userobj->getAllData();

                foreach ($data as $val){
                    echo "Username: ".$val["userName"];
                    echo "<br>";
                    echo "Firstname: ".$val["firstName"];
                    echo "<br>";
                    echo "Lastname: ".$val["lastName"];
                    echo "<br>";
                    echo "Birthdate: ".$val["birthdate"];
                    echo "<br>";
                    echo "Profile description: ".$val["description"];
                    echo "<br>";
                    echo "State: ".$val["state"];
                    echo "<br>";
                    echo "e-mail: ".$val["email"];
                    echo "<br>";
                    echo "Phone number: ".$val["phone"];
                    echo "<br>";
                    
                    if ($val["genderId"] == 0){
                        echo "Gender: Male";
                    }
                    else if ($val["genderId"] == 1){
                        echo "Gender: Female";
                    }

                    echo "<br>";

                    if ($val["prefferedGenderId"] == 0){
                        echo "Preffered gender: Male";
                    }
                    else if ($val["prefferedGenderId"] == 1){
                        echo "Preffered gender: Female";
                    }
                    
                    
                }
            ?>

            <!-- LOG OUT -->
            <form method="get" action="/logOut.php">
                <button type="submit">Log out</button>
            </form>

        <!-- <div class="loadercontainer" id="hidediv">
            <span class="loader"><span class="loader-inner"></span></span>
        </div> -->

        <img class="bottomscreen" src="./images/bot.png" alt="bottom">
    </body>
</html>