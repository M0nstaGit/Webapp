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
    echo "<br>";
    echo $val["firstName"];
    echo "<br>";
    echo $val["lastName"];
    echo "<br>";
    echo $val["birthdate"];
    echo "<br>";
    echo $val["description"];
    echo "<br>";
    echo $val["state"];
    echo "<br>";
    echo $val["email"];
    echo "<br>";
    echo $val["phone"];
    echo "<br>";
    echo $val["genderId"];
    echo "<br>";
    echo $val["prefferedGenderId"];
    echo "<br>";
}

?>
 