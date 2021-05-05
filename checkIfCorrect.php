<?php
    session_start();
    include 'includes/class-autoload.inc.php';
    
    $passObj = new user();
    $passObj->checkpass();
?>

