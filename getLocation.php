<?php
    session_start();

    print_r($_POST);
    $_SESSION['county'] = $_POST;
?>