<?php
    include 'includes/class-autoload.inc.php';
    session_start();
    if (isset($_POST['submit'])){

        $var1 = $_POST[firstName];
        $var2 = $_POST[lastName];
        $var3 = $_POST[password];
        $var4 = $_POST[birthdate];
        $var5 = $_POST[description];
        $var6 = $_POST[locationId];
        $var7 = $_POST[email];
        $var8 = $_POST[phone];
        $var10 = $_POST[gender];
        $var11 = $_POST[preferredGender];
        $var12 = $_POST[userName];

        
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileName = $_FILES['file']['type'];

        $fileExt = explode('/', $fileName);

        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg','jpeg','png');

        if (in_array($fileActualExt, $allowed)){
            if ($fileError === 0){
                if ($fileSize < 50000000){
                    
                    $fileNameNew = "sportbud-pf-".$var12.".".$fileActualExt;
                    $fileDestination = '../profilepictures/'.$fileNameNew;
                    $var9 = $fileDestination;
                    // The hash of the password that
                    // can be stored in the database
                    $hash = password_hash($var3, PASSWORD_BCRYPT);

                    $setuserobj = new user();
                    $setuserobj->setuserstmt($var1,$var2,$hash,$var4,$var5,$var6,$var7,$var8,$var9,$var10,$var11,$var12);
                    
                    move_uploaded_file($fileTmpName, $fileDestination);
                    header("Location: makesports.php");

                }else{
                    $msg = "<span class='errorMessage'>File is too powerfull!</span>";
                }
            }else{
                $msg = "<span class='errorMessage'>There was aan error uploading your file!</span>";
            }
        }else{
            $msg = "<span class='errorMessage'>You cannot upload files of this type!</span>";
        }

        
        
        
        #$var1 = "test";
        #$var2 = "test";
        #$var3 = "test";
        #$var4 = NULL;
        #$var5 = "test";
        #$var6 = 1;
        #$var7 = "kak@gmail.com";
        #$var8 = 0;
        #$var9 = NULL;
        #$var10 = 1;
        #$var11 = 1;
        #$var12 = "test";

        
    }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Create Account</title>
    <script src="./assets/jquery-3.6.0.min.js"></script>
    <script src="./js/makeAcc.js"></script>
</head>
    <body class="scrollable">
        <?php include "/includes/header.php"?>
        <div class="centerTitle">
            <h1>Create account</h1>
        </div>
        <main class="form">
            <form class="formMargin" action="makeAccount.php" method="POST" enctype="multipart/form-data">
                <table class="formTable m-auto">
                    <tbody>
                        <tr>
                            <td><input type="text" class="createAccField" id="firstName" name="firstName" placeholder="First Name" required/></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="createAccField" id="lastName" name="lastName" placeholder="Last Name" required/></td>
                        </tr>
                        <tr>
                            <td><input type="email" class="createAccField" id="email" name="email" placeholder="E-mail" required/></td>
                        </tr>
                        <tr>
                            <td><input type="tel" class="createAccField" id="phone" name="phone" placeholder="Phone number" required/></td>
                        </tr>
                        <tr>
                            <td><input type="date" class="createAccField" id="birthdate" name="birthdate" required/></td>
                        </tr>
                        <tr>
                            <td><button class="createAccFieldBtn" onclick="getLocation()">Get location</button></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="createAccField" id="description" name="description" placeholder="Description" required /></td>
                        </tr>
                        <tr>
                            <td><input type="file" class="createAccField" id="pictureURL" name="file"/></td>
                        </tr>
                        <?php 
                        if ($msg != NULL){
                            echo'<tr><td><input type="file" class="createAccField" id="pictureURL" name="file"/>'.$msg.'</td></tr>';
                        }
                        ?>
                        <tr>
                            <td><select class="createAccField" id="gender" name="gender">
                                <option value="0">Gender: Men</option>
                                <option value="1">Gender: Woman</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><select class="createAccField" id="preferredGender" name="preferredGender" placeholder="Preffered gender" required>
                                <option value="0">Preferred gender: Men</option>
                                <option value="1">Preferred gender: Woman</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><input type="text" id="userName" name="userName" class="createAccField" placeholder="Username" required/></td>
                        </tr>
                        <tr>
                            <td><input type="password" id="password" name="password" class="createAccField" placeholder="Password" required/></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Continue" name="submit" class="myButton"/></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </main>
        <img class="bottomscreen" src="./images/bot.png" alt="bottom">
    </body>
</html>
