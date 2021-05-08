<?php
    session_start();
    include 'includes/class-autoload.inc.php';

    $username    = $_SESSION['username'];
    $title       = $_POST['title'];
    $dt          = $_POST['dt'];

    $passEvent = new calendar();
    $passEvent->addEvent($username, $title, $dt);
?>