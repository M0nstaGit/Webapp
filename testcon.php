<?php
session_start();
include 'includes/class-autoload.inc.php';
echo "hello";

$userNameInput = "test";
$passwordInput = "test";
$_SESSION['loginerror'] = 0;

$testObj = new user();
$testObj->checkpass($userNameInput,$passwordInput);