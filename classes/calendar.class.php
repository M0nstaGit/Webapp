<?php

class calendar extends dbh {

    public function addEvent($username, $title, $dt){
        $sql = "INSERT INTO event(userName, title, dateTime) VALUES (?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $title, $dt]);
        
        header("Location: calendar.php");
    }
}

?>
