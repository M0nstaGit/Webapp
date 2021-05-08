<?php
session_start();

class calendar extends dbh {

    public function addEvent($username, $title, $dt){
        $sql = "INSERT INTO event(idEvent, userName, title, dateTime) VALUES (?,?,?,?)";
        $stmt = $this->connect2()->prepare($sql);
        $stmt->execute([NULL, $username, $title, $dt]);
        
        header("Location: calendar.php");
    }

    public function eventsToJSON() {
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM event WHERE userName = ?";
        $stmt = $this->connect2()->prepare($sql);
        $stmt->execute([$username]);

        $eventArray = array();

        while($row = $stmt->fetch()){
            $dt = substr($row['dateTime'],0,10);
            $rowArray = array(
                'title' => $row['title'],
                'start' => $dt
            );
            array_push($eventArray, $rowArray);
        }
        $_SESSION['array'] = $eventArray;
    }
}
