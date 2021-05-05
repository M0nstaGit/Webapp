<?php 
    session_start();
    if($_SESSION['loginerror'] > 0) {
        $msg = "<span style='color:red'>incorrect username/ password please try again.</span>";
    }
    else{
        $msg = "";
    }

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Login</title>
</head>
    <body>
        <!-- Header -->
        <?php include "/includes/header.php"?>
        <div class="loginWrapper" class="shadow-dreamy">
            <!-- Main -->
            <h1 class="loginTitle">Login</h1>
            <form class="formLogIn" action="./checkIfCorrect.php" method="POST">
                <table class="tableLogIn">
                    <tbody>
                        <tr>
                            <td><input type="text" class="typingField" id="userNameInput" name="userNameInput" placeholder="Username" required/></td>
                        </tr>
                        <tr>
                            <td><input type="password" class="typingField" id="passwordInput" name="passwordInput" placeholder="Password" required/></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Log in" class="myButton"/></td>
                            </tr>
                                
                    </tbody>
                </table>
                <?php 
                    echo "$msg"; 
                ?>
            </form>
        </div>
        <p class="createAccMess">Dont have an account yet?</p>
        <div class="createAccLink">
        <a href='./makeAccount.php'>Create account</a>
        </div>
        <img class="bottomscreen" src="./images/bot.png" alt="bottom">
    </body>
</html>