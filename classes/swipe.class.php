<?php
session_start();

class swipe extends user {

    // GRABS ALL USERS EXCEPT YOU AND ALREADY LIKED PEOPLE
    public function grabsUsers() {
        $userName = $_SESSION['username'];
        $prefgender = $this->getprefgender();
        $gender = $this->getgender();
        $sql = "SELECT * FROM user LEFT JOIN friends ON user.userId = friends.userId1 WHERE userName != ? AND user.prefferedGenderId = ? AND user.genderId = ? AND relationStatus IS NULL ORDER BY RAND()";
        
        $stmt = $this->connect2()->prepare($sql);
        $stmt->execute([$userName, $gender ,$prefgender]);

        // GRABS CURRENTUSERID
        $currentUserId = $this->getuserid();

        // DISPLAYS ALL THE USERS THAT MATCH WITH FILTERS
        while($row = $stmt->fetch()){
        $sql2 = "SELECT relationStatus FROM friends WHERE userId2 = ? AND userId1 = ? OR userId1 = ? AND userId2 = ?";
        $stmt2 = $this->connect2()->prepare($sql2);
        $stmt2->execute([$currentUserId,$row['userId'],$currentUserId,$row['userId']]);
        $row2 = $stmt2->fetch();

        if ($row2['relationStatus'] == NULL){
            //var_dump($row2);
            ?>
            <div class="swipe-card js-card">
                <?php if ($row['pictureURL'] != NULL) {
                    ?>
                        <img class='profilePicture' src=<?php echo $row['pictureURL'] ?>>
                    <?php
                }
                ?>
                <input id="currentId" type="hidden" name="currentId" value="<?php echo $currentUserId ?>">
                <input id="userId" type="hidden" name="userId" value="<?php echo $row['userId'] ?>">
                <h1><?php echo $row['firstName'] . " " . $row['lastName'] ?></h1>
                <p ><?php echo $row['birthdate']?></p>
                <p><?php echo $row['description']?></p>
                <p><?php echo $row['userId']?></p>
                <div class="swipeButtons">
                    <button type="button" onclick="like()">Like</button>
                    <button type="button" onclick="dislike()">Dislike</button>
                </div>
            </div>
        <?php }

        }
    }

    public function match($user1,$user2){

        $sql = "SELECT relationStatus FROM friends WHERE userId2 = ? AND userId1 = ? OR userId1 = ? AND userId2 = ?";

        # SELECT * FROM user LEFT JOIN friends ON user.userId = friends.userId1";

        $stmt = $this->connect2()->prepare($sql);
        $stmt->execute([$user1,$user2,$user1,$user2]);

        $row = $stmt->fetch();

        if ($row['relationStatus'] == NULL){
            echo "NULL";
        }
        else{
            echo $row['relationStatus'];
        }
    }

    public function insertfriend($cur,$id,$rel){
        $sql = "INSERT INTO friends (userId1, userId2, relationStatus) VALUES (?,?,?)";
        $stmt = $this->connect2()->prepare($sql);
        $stmt->execute([$cur,$id ,$rel]);
    }
}
?>

<?php 
// Grab user with correct gender and if not in relationstatus
// if liked insert userId1 + userId2 relationstatus 1
// --> disliked 0

// SELECT * FROM user LEFT JOIN friends ON user.userId = friends.userId1 WHERE user.prefferedGenderId = 0 AND user.genderId = 1 AND relationStatus IS NULL ORDER BY RAND() LIMIT 1
// WORKING | $sql = "SELECT * FROM user WHERE userName != ? AND genderId = ?";
?>