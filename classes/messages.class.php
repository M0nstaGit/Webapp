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
    public function getNames(){
        //GETS CURRENT USER
        $currentUserId = $this->getuserid();

        $sqlUserId = "SELECT firstName,lastName FROM user WHERE userId = (SELECT userId1 FROM friends WHERE userId1 = $currentUserId AND relationStatus = 1 OR userId2 = $currentUserId AND relationStatus = 1)";

        $stmtUserId = $this->connect2()->prepare($sqlUserId);

        $stmtUserId->execute();

        $friendNames = $stmtUserId->fetchall();
        return $friendNames;
    }

    //GETS ALL THE MESSAGES OF THE CURRENTUSER AND THE SELECTED FRIEND
    public function getMessages($userId1,$userId2){
        
        $sqlMessages = "SELECT userid1,userid2,`message` FROM `message` WHERE userId2 = ? AND userId1 = ? OR userId1 = ? AND userId2 = ?";

        $stmtMessages = $this->connect2()->prepare($sqlMessages);

        $stmtMessages->execute([$user1,$user2,$user1,$user2]);

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