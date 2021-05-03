<?php
    include "/includes/dbh.inc.php";
    include "/includes/user.inc.php";

    $var1 = $_POST[firstName];
    $var2 = $_POST[lastName];
    $var3 = $_POST[password];
    $var4 = $_POST[birthdate];
    $var5 = $_POST[description];
    $var6 = $_POST[locationId];
    $var7 = $_POST[email];
    $var8 = $_POST[phone];
    $var9 = $_POST[pictureURL];
    $var10 = $_POST[gender];
    $var11 = $_POST[preferredGender];
    $var12 = $_POST[userName];
  
    // The hash of the password that
    // can be stored in the database
    $hash = password_hash($var3, PASSWORD_BCRYPT);
    
    // Print the generated hash
    

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


    # ../ ga naar root van project


    $obj = new dbh();
    $obj->getAllUsers();

    header("Location: login.php");
?>