<?php
    session_start();

    if(empty($_SESSION['username'])){
        header("Location: login.php");
    }
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
        
        <div class="messages" id="messagelist">
        </div>

        <div class="sendMessages">
        <!--sending message prototype-->
        <table class="tableLogIn">
                    <tbody>
                        <tr>
                            <td><label for="messageInput"></label></td>
                            <td><input type="text" class="messageInput" name="messageInput" placeholder="message" required/></td>
                       
                            <td><input type="submit" value="send"/></td>
                        </tr>
                    </tbody>
                </table>
        
        </div>

        <img class="bottomscreen" src="./images/bot.png" alt="bottom">


        <script>
            const IdUser = 1;
            const IdUser2 = 2;
            var messages,mlen,text,i;

            messages = [
                [2,"by Other User"],
                [2,"by Other User"],
                [2,"by Other User"],
                [1,"By this User, first"],
                [1,"By this User, second"],
                [1,"By this User, third"],
                [2,"by Other User"],
                [2,"by Other User"],
                [2,"by Other User"],
                [1,"By this User, first"],
                [1,"By this User, second"],
                [1,"By this User, third"]
            ];
            mLen = messages.length;
            
            text = "<ul>";
            for (i = 0; i < mLen; i++) {
            
            	if(messages[i][0]==IdUser){
                	text += ' <li class="send">' + messages[i][1] + "</li>";
                }
                else if(messages[i][0]==IdUser2){
                	text += '<li class="recieve">' + messages[i][1] + "</li>";
                }
                else{
                	text += '<li class="recieve">' + "tis kapot" + "</li>";
                }
            }
            text += "</ul>";

            document.getElementById("messagelist").innerHTML = text;
        </script>
    </body>
</html>