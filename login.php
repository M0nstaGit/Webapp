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
    <title>Login</title>
</head>
<body>
    <!-- Header -->
    <?php include "/includes/header.php"?>

    <!-- Main -->
    <h1>Login</h1>
    <form class="formLogIn" action="./checkIfCorrect.php" method="POST">
                <table class="tableLogIn">
                    <tbody>
                        <tr>
                            <td><label for="userNameInput"></label></td>
                            <td><input type="text" id="userNameInput" name="userNameInput" placeholder="User name" required/></td>
                        </tr>
                        <tr>
                            <td><label for="passwordInput"></label></td>
                            <td><input type="password" id="passwordInput" name="passwordInput" placeholder="Password" required/></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Log in" class="myButton"/></td>
                        </tr>
                        
                    </tbody>
                </table>
                <?php 
                    echo "$msg"; 
                ?>
                <p>Dont have an account yet?</p>
                <a href='./makeAccount.php'>Create account</a>
            </form>
</body>
</html>