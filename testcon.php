<?php
session_start();
include 'includes/class-autoload.inc.php';
$user1 = 63;
$user2 = 60;

$users = new swipe();
$users->match($user1,$user2);

?>
 