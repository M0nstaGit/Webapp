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
            echo "<h1>Welcome, $Name!</h1>";
            ?>
            <h2>You sported for $Time hours this week</h2>

            <!-- LOG OUT -->
            <form method="get" action="/logOut.php">
                <button type="submit">Continue</button>
            </form>

            <div class="friendsWrapper"> <!-- friends on homepage !-->
                <table class="tableFriends">
                    <tr>
                        <th>Your friends</th>
                    </tr>
                    <?php
                        $userobj = new user();
                        $ids = $userobj->getfriends1();
    
                        foreach ($ids as $row){
                            $friendsid = $row["userId2"];
                            $friend = $userobj->getusername($friendsid);
                            echo "<tr><td>".$friend."</td></tr>";
                        }
                    
                        $ids = $userobj->getfriends2();
                    
                        foreach ($ids as $row){
                            $friendsid = $row["userId1"];
                            $friend = $userobj->getusername($friendsid);
                            echo "<tr><td>".$friend."</td></tr>";
                        }    
                    ?>
                </table>  
            </div>
        </div>

        

        <!-- <div class="loadercontainer" id="hidediv">
            <span class="loader"><span class="loader-inner"></span></span>
        </div> -->

        <img class="bottomscreen" src="./images/bot.png" alt="bottom">
    </body>
</html>