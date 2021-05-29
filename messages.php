<!--test id's zijn id1:1  id2:54-->
<?php
    // Report all errors except E_NOTICE   
    error_reporting(E_ALL ^ E_NOTICE);

    session_start();
    include 'includes/class-autoload.inc.php';
    if(empty($_SESSION['username'])){
        header("Location: login.php");
    }

    function object_to_array($data)
    {
        if(is_array($data) || is_object($data))
        {
            $result = array();
        
            foreach($data as $key => $value) {
                $result[$key] = $this->object_to_array($value);
            }
        
            return $result;
        }
    
        return $data;
    }

    $currentUserId = new user();
    $currentUserId->getuserid();

    $friendIds = new messages();
    $friendIds->getFriends();
    $friendIdsArray = object_to_array($friendIds);
    var_dump( (array) $friendIdsArray);

    $friendNames = new messages();
    $friendNames->getNames($friendIds);
    $friendNamesArray = object_to_array($friendNames);
    
    var_dump( (array) $friendNamesArray );


    
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
        
        <input type="hidden" name="friendNamesArray" value="<?php echo $friendNamesArray; ?>" id="friendNamesArray">
        <input type="hidden" name="friendIdsArray" value="<?php echo $friendIdsArray; ?>" id="friendIdsArray">

        <div class="messagePreview" id="messagePreview">
            
        </div>

       

        <img class="bottomscreen" src="./images/bot.png" alt="bottom">


        <script>
            var friends = document.querySelector('friendNamesArray')
            var flen,text,i;

            //friends = ["jonas","vantrappen",
            //           "louis","debacker",
            //           "jordi","timmers",]

            console.log(friends);

            fLen = friends.length;
            
            text = '<div class="friendDisplay">';
            for (i = 0; i < fLen; i=i+2) {
                console.log("we zitten in de FOR1");
                var j = 0;
                text += '<a href="messagesPersonal.php" id="'+ j +'" class="friend">';
                for (k = 0; k < flen; k=k+1){
                    console.log("we zitten in de FOR2");
                    if(k==null){
                        console.log("we zitten in de if == null");
                        break
                    }
                    text += friends[i][k]
                }
                text += '</a>';
                j++;
            }
            text += "</div>";

            document.getElementById("messagePreview").innerHTML = text;
        </script>
    </body>
</html>