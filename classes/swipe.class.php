<?php
session_start();

class swipe extends user {

    // GRABS ALL USERS EXCEPT YOU AND ALREADY LIKED PEOPLE
    public function grabsUsers() {
        $userName = $_SESSION['username'];
        $prefgender = $this->getprefgender();
        $sql = "SELECT * FROM user WHERE userName != ? AND genderId = ?";
        
        $stmt = $this->connect2()->prepare($sql);
        $stmt->execute([$userName, $prefgender]);


        while($row = $stmt->fetch()){
        
        ?> 
        
            <div class="swipe-card js-card">
                <?php if ($row['pictureURL'] != NULL) {
                    ?>
                        <img class='profilePicture' src=<?php echo $row['pictureURL'] ?>>
                    <?php
                }
                ?>
                <h1><?php echo $row['firstName'] . " " . $row['userName'] ?></h1>
                <p><?php echo $row['birthdate']?></p>
                <p><?php echo $row['description']?></p>
                <div class="swipeButtons">
                    <button type="button" onclick="like()">Like</button>
                    <button type="button" onclick="dislike()">Dislike</button>
                </div>
            </div>
        <?php
        }
    }
}
?>

<?php 
// Grab user with correct gender and if not in relationstatus
// if liked insert userId1 + userId2 relationstatus 1
// --> disliked 0
?>