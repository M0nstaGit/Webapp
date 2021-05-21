<!--test id's zijn id1:26  id2:30-->
<?php
    session_start();
    include 'includes/class-autoload.inc.php';
    if(empty($_SESSION['username'])){
        header("Location: login.php");
    }
    $currentUserId = new user()
    $currentUserId->getuserid();

    $friendIds = new messages();
    $friendIds->getFriends();

    $friendNames = new messages();
    $friendNames->getNames($friendIds)
?>
<!-- Messages page -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Messages</title>
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/loadanimation.css">
        <link rel="shortcut icon" type="image/png" href="./images/sportbud.png">
    </head>

    <body>
        <?php include_once 'includes/header.php'?>
        
        <div class="messagePreview" id="messagePreview">
            
        </div>

       

        <img class="bottomscreen" src="./images/bot.png" alt="bottom">


        <script>
            var friends,flen,text,i;

            friends = "<?php echo $friendNames; ?>";
            fLen = friends.length;
            
            text = '<div class="friendDisplay">';
            for (i = 0; i < fLen; i++) {
            
                text += '<a href="messagesPersonal.php" id="'i'" class="friend">' + friends[i] + '</a>';
            }
            text += "</div>";

            document.getElementById("messagePreview").innerHTML = text;
        </script>
    </body>
</html>