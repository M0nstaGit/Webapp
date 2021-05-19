<?php
session_start();

class swipe extends dbh {

    // GRABS ALL USERS EXCEPT YOU AND ALREADY LIKED PEOPLE
    public function grabsUsers() {
        $userName = $_SESSION['username'];
        $sql = "SELECT * FROM user";
        $stmt = $this->connect2()->prepare($sql);
        $stmt->execute();

        while($row = $stmt->fetch()){
            ?>
            <div class="swipe-card js-card">
                <h1><?php echo $row['firstName'] . " " . $row['userName'] ?></h1>
                <p><?php echo $row['birthdate']?></p>
                <p><?php echo $row['description']?></p>
            </div>
        <?php
        }
    }
}
?>