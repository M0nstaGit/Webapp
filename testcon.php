<?php
session_start();
include 'includes/class-autoload.inc.php';
#$user1 = 63;
#$user2 = 60;

$userobj = new user();
$ids = $userobj->getfriends1();

foreach ($ids as $row){
    $friendsid = $row["userId2"];
    $friend = $userobj->getusername($friendsid);
    echo $friend;
}

$ids = $userobj->getfriends2();

foreach ($ids as $row){
    $friendsid = $row["userId1"];
    $friend = $userobj->getusername($friendsid);
    echo $friend;
}


?>
 