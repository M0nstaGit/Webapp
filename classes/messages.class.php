<?php

class messages extends user {


    //GETS ALL ID'S FROM CURRENT USERS FRIENDS
    public function getFriends(){
        //GETS CURRENT USER
        $currentUserId = $this->getuserid();

        $sqlFriends = "SELECT userId1,userId2 FROM friends WHERE userId1 = $currentUserId AND relationStatus = 1 OR userId2 = $currentUserId AND relationStatus = 1";
        $stmtFriends = $this->connect2()->prepare($sqlFriends);
        $stmtFriends->execute();
        $ids = $stmtFriends->fetchall();
        return $ids;
    }

    //GETS ALL THE NAMES OF THE IDS THE GETFRIENDS FUNCTION FILTERED OUT
    public function getfriends1(){
        $userId = $this->getuserid();

        $sql = "SELECT userId2 FROM friends WHERE userId1 = ? AND relationStatus = 1";
        $stmt = $this->connect2()->prepare($sql);
        $stmt->execute([$userId]);

        $friends = $stmt->fetchall();
        
        return $friends;
    }

    public function getfriends2(){
        $userId = $this->getuserid();

        $sql = "SELECT userId1 FROM friends WHERE userId2 = ? AND relationStatus = 1";
        $stmt = $this->connect2()->prepare($sql);
        $stmt->execute([$userId]);

        $friends = $stmt->fetchall();
        
        return $friends;
    }

    //GETS ALL THE MESSAGES OF THE CURRENTUSER AND THE SELECTED FRIEND
    public function getMessages($userId1,$userId2){
        
        $sqlMessages = "SELECT userid1,userid2,`message` FROM `message` WHERE userId2 = ? AND userId1 = ? OR userId1 = ? AND userId2 = ?";

        $stmtMessages = $this->connect2()->prepare($sqlMessages);

        $stmtMessages->execute([$userId1,$userId2,$userId1,$userId2]);

        $messages = $stmtMessages->fetchall();
        //WE ONLY NEED USERID1 BECAUSE THE PREVIOUS SQL STATEMENT ONLY FILTERED OUT THE MESSAGES THE USER AND THE SELECTED FRIEND SEND TO EACHOTHER
        //AND USERID1 IS THE USER WHO SENT THE MESSAGE
        return $messages;
    }

    //SETS THE TYPED MESSAGE TO THE DATABASE
    public function setMessage($userId1,$userId2,$messageInput){
        $sqlsetMessage = "INSERT INTO `message`(userid1,userid2,`message`) VALUES (?,?,?)";

        $stmtsetMessage = $this->connect2()->prepare($sqlsetMessage);

        $stmtsetMessage->execute([$userId1,$userId2,$messageInput]);
    }



}

?>