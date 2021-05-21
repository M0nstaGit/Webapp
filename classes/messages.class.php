<?php

class messages extends user {


    //GETS ALL ID'S FROM CURRENT USERS FRIENDS
    public function getFriends(){

        //GETS CURRENT USER
        $currentUserId = $this->getuserid();

        $sql = "SELECT userId2 from friends WHERE userId1 = $currentUserId AND relationStatus = 1";

        $stmt = $this->connect2()->prepare($sql);

        $ids = $stmt->fetchall();
        return $ids;
    }

    //GETS ALL THE NAMES OF THE IDS THE GETFRIENDS FUNCTION FILTERED OUT
    public function getNames($friendId){
        $sql = "SELECT firstName,lastName from user WHERE userId = ?";

        $stmt = $this->connect2()->prepare($sql);

        $stmt->execute([$friendId]);

        $friendNames = $stmt->fetchall();
        return $names;
    }

    //GETS ALL THE MESSAGES OF THE CURRENTUSER AND THE SELECTED FRIEND
    public function getMessages($userId1,$userId2){
        $sql = "SELECT userid1,userid2,`message` FROM `message` WHERE userId2 = ? AND userId1 = ? OR userId1 = ? AND userId2 = ?";

        $stmt = $this->connect2()->prepare($sql);

        $stmt->execute([$user1,$user2,$user1,$user2]);

        $messages = $stmt->fetchall();
        //WE ONLY NEED USERID1 BECAUSE THE PREVIOUS SQL STATEMENT ONLY FILTERED OUT THE MESSAGES THE USER AND THE SELECTED FRIEND SEND TO EACHOTHER
        //AND USERID1 IS THE USER WHO SENT THE MESSAGE
        return $messages['userid1','message'];
    }

    //SETS THE TYPED MESSAGE TO THE DATABASE
    public function setMessage($userId1,$userId2,$messageInput){
        $sql = "INSERT INTO `message`(userid1,userid2,`message`) VALUES (?,?,?)";

        $stmt = $this->connect2()->prepare($sql);

        $stmt->execute([$userId1,$userId2,$messageInput]);
    }



}

?>