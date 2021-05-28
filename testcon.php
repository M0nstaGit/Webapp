<?php
session_start();
include 'includes/class-autoload.inc.php';
#$user1 = 63;
#$user2 = 60;

#$userobj = new user();
#$ids = $userobj->getfriends1();
#
#foreach ($ids as $row){
#    $friendsid = $row["userId2"];
#    $friend = $userobj->getusername($friendsid);
#    echo $friend;
#}
#
#$ids = $userobj->getfriends2();
#
#foreach ($ids as $row){
#    $friendsid = $row["userId1"];
#    $friend = $userobj->getusername($friendsid);
#    echo $friend;
#}
$userobj = new user();
$data = $userobj->getAllData();

var_dump($data);

echo "<br>";

foreach ($data as $val){
    echo $val["userName"];
    echo $val["firstName"];
    echo $val["lastName"];
    echo $val["birthdate"];
    echo $val["description"];
    echo $val["state"];
    echo $val["email"];
    echo $val["phone"];
    echo $val["genderId"];
    echo $val["prefferedGenderId"];
}

?>
 