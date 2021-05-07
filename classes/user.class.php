<?php
//create class user that extends database
class user extends dbh {

    public function getusers(){
        $sql = "SELECT * FROM user";
        $stmt = $this->connect()->query($sql);

        while($row = $stmt->fetch()){
            echo $row['firstName'] . '<br>';
        }
    }

    public function checkpass(){
        $userNameInput = $_POST['userNameInput'];
        $passwordInput = $_POST['passwordInput'];
        $_SESSION['loginerror'] = 0;
        $sql = "SELECT password FROM user WHERE userName = ?";
        $stmt = $this->connect()->prepare($sql);
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
        $sql = "INSERT INTO user (userId, matchId, sportsId, firstName, lastName, password, birthdate, description, locationId, email, phone, pictureURL, genderId, prefferedGenderId, userName) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([NULL,NULL,NULL,$var1,$var2,$hash,$var4,$var5,$var6,$var7,$var8,$var9,$var10,$var11,$var12]);
        
        header("Location: login.php");
    }
    
}
