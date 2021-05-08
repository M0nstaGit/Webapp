<?php
    include 'includes/class-autoload.inc.php';

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

    $setuserobj = new user();
    $setuserobj->setuserstmt($var1,$var2,$hash,$var4,$var5,$var6,$var7,$var8,$var9,$var10,$var11,$var12);

    header("Location: makesports.php");
?>