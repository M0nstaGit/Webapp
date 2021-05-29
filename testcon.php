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
function object_to_array($data)
{
    if(is_array($data) || is_object($data))
    {
        $result = array();
    
        foreach($data as $key => $value) {
            $result[$key] = object_to_array($value);
        }
    
        return $result;
    }

    return $data;
}

$currentUserId = new user();
$currentUserId->getuserid();

$friendIds = new messages();
$ids = $friendIds->getFriends();

$friendIdsArray = object_to_array($ids);
var_dump($friendIdsArray);

echo "<br>";
echo "<br>";

foreach ($friendIdsArray as $friendid){
    if (key_exists("userId2",$friendid)){
        echo $friendid["userId2"];
    }
    else{
        echo $friendid["userId1"];
    }
    echo "<br>";
}

$friendNames = new messages();
$names = $friendNames->getNames();

var_dump($names);

?>
 