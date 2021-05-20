<?php
    session_start();
    include './includes/class-autoload.inc.php';

    // function insertMatch() {
    //     // INSERT HERE
    // }

    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //         insertMatch();
    //     } 

    $_SESSION['swipe'] = $_POST;
?>