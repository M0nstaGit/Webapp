<?php
//create class user that extends database
class user extends dbh {

    public function getusers(){
        $sql = "SELECT * FROM user";
        $stmt = $this->connect2()->query($sql);

        while($row = $stmt->fetch()){
            echo $row['firstName'] . '<br>';
        }
    }

    public function getAllData(){
        $sql = "SELECT userId,firstName,lastName,birthdate,description,state,email,phone,genderId,prefferedGenderId,userName FROM user WHERE userId = ?";
        $stmt = $this->connect2()->prepare($sql);
        $userid = $this->getuserid();
        $stmt->execute([$userid]);
        $row = $stmt->fetchAll();

        return $row;
    }

    public function getusername($friendsid){
        $sql = "SELECT userName FROM user WHERE userId = ?";

        $stmt = $this->connect2()->prepare($sql);
        $stmt->execute([$friendsid]);
        $row = $stmt->fetch();
        $friend = $row['userName'];

        return $friend;
    }

    public function checkpass(){
        $userNameInput = $_POST['userNameInput'];
        $passwordInput = $_POST['passwordInput'];
        $_SESSION['loginerror'] = 0;
        $sql = "SELECT password FROM user WHERE userName = ?";
        $stmt = $this->connect2()->prepare($sql);
        $stmt->execute([$userNameInput]);
        $row = $stmt->fetch();
        $hashpass = $row['password'];

        if (password_verify($passwordInput, $hashpass))
        {
            /* The password is correct. */
            $_SESSION['username'] = $userNameInput;
            header("Location: home.php");

        }
        else{
            $_SESSION['loginerror'] = 1;
            header("Location: login.php");
        }
    }

    // function with prepared statement
    public function setuserstmt($var1,$var2,$hash,$var4,$var5,$var6,$var7,$var8,$var9,$var10,$var11,$var12){

        $sql = "INSERT INTO user (userId, matchId, sportsId, firstName, lastName, password, birthdate, description, state, email, phone, pictureURL, genderId, prefferedGenderId, userName) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect2()->prepare($sql);
        $stmt->execute([NULL,NULL,NULL,$var1,$var2,$hash,$var4,$var5,$var6,$var7,$var8,$var9,$var10,$var11,$var12]);
        session_start();
        $_SESSION['username'] = $var12;
        
        header("Location: makesports.php");
    }

    public function getuserid(){
        $sql = "SELECT userId FROM user WHERE userName = ?";
        $stmt = $this->connect2()->prepare($sql);
        $stmt->execute([$_SESSION['username']]);
        $row = $stmt->fetch();
        $userId = $row['userId'];
        //$userId = $row['userId'];
        
        return $userId;
    }

    public function setsports($var1,$var2){

        $sql = "INSERT INTO Sports (UserId, Sports) VALUES (?,?)";
        $stmt = $this->connect2()->prepare($sql);
        $stmt->execute([$var1,$var2]);
        
        header("Location: login.php");
    }

    public function getgender(){
        $sql = "SELECT genderId FROM user WHERE userName = ?";
        $stmt = $this->connect2()->prepare($sql);
        $stmt->execute([$_SESSION['username']]);
        $row = $stmt->fetch();
        $genderId = $row['genderId'];
        
        return $genderId;
    }

    public function getprefgender(){
        $sql = "SELECT prefferedGenderId FROM user WHERE userName = ?";
        $stmt = $this->connect2()->prepare($sql);
        $stmt->execute([$_SESSION['username']]);
        $row = $stmt->fetch();
        $prefgenderId = $row['prefferedGenderId'];
        
        return $prefgenderId;
    }

    public function getfriends1(){
        $userId = $this->getuserid();

        $sql = "SELECT userId2 FROM friends WHERE userId1 = ? AND relationStatus = 1 LIMIT 5";
        $stmt = $this->connect2()->prepare($sql);
        $stmt->execute([$userId]);

        $friends = $stmt->fetchall();
        
        return $friends;
    }

    public function getfriends2(){
        $userId = $this->getuserid();

        $sql = "SELECT userId1 FROM friends WHERE userId2 = ? AND relationStatus = 1 LIMIT 5";
        $stmt = $this->connect2()->prepare($sql);
        $stmt->execute([$userId]);

        $friends = $stmt->fetchall();
        
        return $friends;
    }
    
}
