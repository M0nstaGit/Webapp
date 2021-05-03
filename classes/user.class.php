<?php

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
        $sql = "SELECT password FROM user WHERE userName = '$userNameInput'";
        $stmt = $this->connect()->query($sql);

        while($row = $stmt->fetch()){
            $hashpass = $row['password'];
        }

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
    
}
